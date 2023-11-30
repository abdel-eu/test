<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
* @author hobrt.me
* @file p_helper.php
* @package hobrtEcom
* @link hobrt.me
* @copyright hobrt.me 2018 => 2019
*
**/
if(!function_exists('_hash'))
{
	function _hash($password)
	{
		$pass = "IttIhAdyHobrt";
		$pass2 = "hobrt-programming.com";
		return sha1($pass.$password.$pass2);
	}
}



if(!function_exists('is_login'))
{
	function is_login($t = "logged_in")
	{
		$CI = & get_instance();
		$info = $CI->session->userdata($t);
		if(!$info)
			return FALSE;
		else
			return $info['id'];
	}
}



if(!function_exists('load_lang'))
{
	function load_lang()
	{
		$CI = & get_instance();
		$info = $CI->session->userdata("lang");
		if(!$info)
			$lang = "english";
		else
			$lang = $info['lang'];
		$CI->lang->load('master', $lang);
		$CI->config->set_item('language', $lang);

	}
}


if(!function_exists('load_admin_lang'))
{
	function load_admin_lang()
	{
		$CI = & get_instance();
		$info = $CI->session->userdata("lang");
		if(!$info)
			$lang = "english";
		else
			$lang = $info['lang'];
		$CI->lang->load('admin', $lang);
		$CI->config->set_item('language', $lang);

	}
}

if(!function_exists('getHtml'))
{
	function getHtml($url, $post = null)  
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		if(!empty($post)) {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		} 
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}



if(!function_exists('login'))
{
	function login()
	{
		$CI = & get_instance();
		$info = $CI->ion_auth->logged_in();
		if(!$info)
			return FALSE;
		else
			return $CI->ion_auth->user()->row()->id;
	}
}

if(!function_exists('is_admin'))
{
	function is_admin()
	{
		return is_login("admin_login");
	}
}


if(!function_exists('page_a'))
{
	function page_a($total,$url,$uri = 3,$nb = 20)
	{
		$config = array();
        $config["base_url"] = base_url().$url;
        $config["total_rows"] = $total;
        $config["per_page"] = $nb;
        $config["uri_segment"] = $uri;
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li><a class='active'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['last_link'] = "الأخيرة";
		$config['first_link'] = "الاولى";
		$config['next_link'] = "»";
		$config['prev_link'] = "«";
		return $config;
	}
}

if(!function_exists("short_text"))
{
	function short_text($input, $maxWords, $maxChars) 
	{
		$words = preg_split('/\s+/', $input);
		$words = array_slice($words, 0, $maxWords);
		$words = array_reverse($words);
		$chars = 0;
		$truncated = array();
		while(count($words) > 0)
		{
			$fragment = trim(array_pop($words));
			$chars += strlen($fragment);
			if($chars > $maxChars) break;
			$truncated[] = $fragment;
		}
		$result = implode($truncated, ' ');
		return strip_tags($result . ($input == $result ? ' '  : ' ...'));
	}
}

if(!function_exists('add_thumb'))
{
	function add_thumb($va ,$t = '_m')
	{
		if(preg_match('/(,)+/', $va))
		{
			$r = explode(',', $va);
			$va = $r[0];
		}
		$a = explode('.', $va);
		$a[0] = $a[0].$t;
		$va = implode('.', $a);
		return $va;
	}
}


if(!function_exists('status'))
{
	function status($s = "x")
	{
		$status = [
			0 => lang("admin_h9"),
			1 => lang("admin_h6"),
			2 => lang("admin_h7"),
			3 => lang("admin_h8"),
			5 => lang("admin_h10")
		];

		return $status[$s] ?? $status;
	}
}

if(!function_exists('get_info'))
{
	function get_info($tab, $id, $col)
	{
		$CI = & get_instance();
		return $CI->m_p->get_info($tab, $id, $col);
	}
}
if(!function_exists('setting'))
{
	function setting($p)
	{
		$CI = & get_instance();
		return $CI->m_p->get_info("settings", FALSE, $p);
	}
}
if(!function_exists('close_website'))
{
	function close_website()
	{
		$CI = & get_instance();
		if(setting("close_website") == 0)
		{
			redirect("close");
		}
	}
}


if(!function_exists('dd'))
{
	function dd($v = array())
	{
		echo "<pre>";
		print_r($v);
		echo "</pre>";
	}
}


function ad_perm()
{
	$ar = array(
		1 	=> array("title" => "المنتوجات", "url" => "products"),
		5 	=> array("title" => "الطلبات", "options" => array(
				array("title" => "الكل", "url" => "orders"),
				array("title" => "بإنتظار التأكيد", "url" => "orders/1"),
				array("title" => "بإنتظار الشحن", "url" => "orders/2"),
				array("title" => "تم الإرسال", "url" => "orders/3"),
				array("title" => "تم إلغاء الطلب", "url" => "orders/0"),
				array("title" => "تم الإستلام", "url" => "orders/5")
			)
		),
		10 	=> array("title" => "الخصومات" , "url" => "discounts"), //options
		9 	=> array("title" => "الاقسام", "url" => "cat"),
		10 	=> array("title" => "الصفحات", "url" => "pages"),
		12 	=> array("title" => "الدعم", "url" => "support"),
		2 	=> array("title" => "المدراء", "url" => "admins"),
		13 	=> array("title" => "إعدادات الموقع", "url" => "setting"),
	);
	return $ar;
}



	/**
	 * Date_arabic
	 *
	 * Returns an Date en arabic.  This is a helper function
	 *
	 * @access	public
	 * @param	int	time in seconds
	 * @return	string
	 */
	if(!function_exists("data_arabic"))
	{
		function date_arabic($sec)
		{
			$days = array("الأحد","الاثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت");
			$months = array("","يناير","فبراير","مارس","إبريل","مايو","يونيو","يوليو","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر");
			$date = getdate($sec);
			return $days[$date['wday']].' '.$date['mday'].' '.$months[$date['mon']].' '.$date['year'];
		}
	}


/**/
/**/