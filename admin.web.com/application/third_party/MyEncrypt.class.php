<?php
class MyEncrypt
{
    private $key = 'JIJX-DF144D-XLLDL-NHD3';

    public function encrypt($input)
    {
        // 数据加密
        static $_map = array();
        $hashkey = md5($input . $this->key);

        $size = mcrypt_get_block_size(MCRYPT_3DES, 'ecb');
        $input = $this->pkcs5_pad($input, $size);
        $key = str_pad($this->key, 24, '0');
        $td = mcrypt_module_open(MCRYPT_3DES, '', 'ecb', '');
        $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        @mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $data = base64_encode($data);
        return $data;
    }

    private function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    public function decrypt($encrypted)
    {
        // 数据解密
        static $_map = array();
        $encrypted = base64_decode($encrypted);
        $hashkey = md5($encrypted . $this->key);

        $key = str_pad($this->key, 24, '0');
        $td = mcrypt_module_open(MCRYPT_3DES, '', 'ecb', '');
        $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        $ks = mcrypt_enc_get_key_size($td);
        @mcrypt_generic_init($td, $key, $iv);
        $decrypted = mdecrypt_generic($td, $encrypted);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $y = $this->pkcs5_unpad($decrypted);
        $_map[$hashkey] = $y;
        return $y;
    }

    private function pkcs5_unpad($text)
    {
        $pad = ord($text{strlen($text) - 1});
        if($pad > strlen($text))
        {
            return false;
        }
        if(strspn($text, chr($pad), strlen($text) - $pad) != $pad)
        {
            return false;
        }
        return substr($text, 0, -1 * $pad);
    }


    function encryptId($id)
    {
        if(!$id)
        {
            return 0;
        }
        $hashkey = md5($id);

        $s1 = ($id + 204518) * 7;
        $l = strlen($s1);
        $lb = intval($l / 2);
        $lc = $l - $lb;
        $a = substr($s1, 0, $lb);
        $b = substr($s1, -1 * ($lc));
        $tmpstr = '';
        for($i = 0; $i < $lb; $i++)
        {
            if($i % 2 == 0)
            {
                $tmpstr .= $a{intval($i / 2)} . $b{($lc - 1 - intval($i / 2))};
            }
            else
            {
                $tmpstr .= $b{intval($i / 2)} . $a{($lb - intval($i / 2) - 1)};
            }
        }
        if($l % 2 == 1)
        {
            $tmpstr .= $b{intval(($lc - 1) / 2)};
        }
        return intval($tmpstr);
    }

    function decryptId($str)
    {
        if(!$str)
        {
            return 0;
        }
        $str = strval($str);
        $hashkey = md5($str);
        $l = strlen($str);
        $tmpstr = array();
        $flag = 1;
        $c = 0;
        for($i = 0; $i < $l; $i++)
        {
            if($i !== 0 && $i % 2 == 0)
            {
                $flag = -$flag;
                if($flag == 1)
                {
                    $c++;
                }
            }
            if($i == $l - 1)
            {
                for($j = 0; $j <= $l; $j++)
                {
                    if(!isset($tmpstr[$j]))
                    {
                        $tmpstr[$j] = $str[$i];
                        break;
                    }
                }
            }
            else
            {
                if($i % 2 == 0)
                {
                    if($flag == 1)
                    {
                        $tmpstr [intval($i / 2) - $c] = $str [$i];
                    }
                    else
                    {
                        $tmpstr [intval($l / 2) + $c] = $str [$i];
                    }
                }
                else
                {
                    if($flag == 1)
                    {
                        $tmpstr[$l - intval(($i - $c * 2) / 2) - 1] = $str [$i];
                    }
                    else
                    {
                        $tmpstr[intval($l / 2) - 1 - $c] = $str [$i];
                    }
                }
            }

        }
        ksort($tmpstr);
        $str = implode("", $tmpstr);
        $str = $str / 7 - 204518;
        if(is_float($str) || $str < 0)
        {
            $str = 0;
        }
        return $str;
    }
}