<?php
//获取当前用户ip
function getip() {
    $unknown = 'unknown';
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    /**
     * 处理多层代理的情况
     * 或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown;
     */
    if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip));
    $ipinf = $this->getIpInfo($ip);
    if ($ipinf['city'] =='内网IP'){
        $ipinf['city'] = '杭州市';
    }
    return $ipinf;
}

/*
    * 通过淘宝IP接口获取IP地理位置
    * @param string $ip
    * @return: string
    * USAGE: php -f taobao_ip.php 121.207.247.202
    **/
function getIpInfo($ip){
    $url='http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
    $result = file_get_contents($url);
    $result = json_decode($result,true);
    if($result['code']!==0 || !is_array($result['data'])) return false;
    return $result['data'];
}