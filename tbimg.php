<?php

// ����ͼ���ɼ�����

// ���ο��� ��֮���� www.myhioo.info

//  �� �� �� �� �� �� �� �� �� �� �� [ ���ÿ�ʼ ] �� �� �� �� �� �� �� �� �� �� �� �� ��

$tbs = array( //�������鿪ʼ���﷨array(key => value) ��key��ѡ��value����

	array( //�������鿪ʼ

		'name' => '��Ů', // ������

		'en' => 'meinv', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '��˿', // ������

		'en' => 'heisi', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '����', // ������

		'en' => 'meiren', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '��', // ������

		'en' => 'tui', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => 'Ƥ��', // ������

		'en' => 'piku', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '�߸�', // ������

		'en' => 'gaogen', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '������', // ������

		'en' => 'neyizhao', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '�߸�', // ������

		'en' => 'gaogen', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '�ػ�����', // ������

		'en' => 'xionghuatianxias', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => '�Ʒ�', // ������

		'en' => 'zhifu', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => 'beautyleg', // ������

		'en' => 'beautyleg', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

	array(

		'name' => 'ģ��', // ������

		'en' => 'mote', // ƴ��

		'p_start' => 1, // ��ʼҳ��

		'p_end' => 5, // ����ҳ��

	),

);

$img_l = 3; // �����������������ͼ��

$img_dir = '/data/tbimg/'; // ͼƬ�洢Ŀ¼

//  �� �� �� �� �� �� �� �� �� �� �� [ ���ý��� ] �� �� �� �� �� �� �� �� �� �� �� �� ��

$red = "\33[31m";

$green = "\33[32m";

$blue = "\33[34m";

$end = "\33[0m";

date_default_timezone_set("Asia/Shanghai"); //�����������ڽű�����������/ʱ�亯����Ĭ��ʱ�����﷨ date_default_timezone_set(timezone)���ο�http://php.net/manual/zh/timezones.php

foreach ($tbs as $tb) {
	//PHPѭ����䣬�˴�foreach��for����ѭ��
	//�﷨
	//foreach ($array as $key=>$value)  ����Ϊ  foreach ($array as $value)
	//{
	//����
	//}

	for ($p = $tb['p_start']; $p <= $tb['p_end']; $p++) {
		//for Ҳ��ѭ�����������ܺ�foreach��࣬�﷨û�鵽

		// �����б��ַ����ҳ����

		$tb_list = "http://tieba.baidu.com/f?kw=" . urlencode($tb['name']) . "&pn=" . ($p - 1) * 50 . "&cid=0";
		//. urlencode   �˺������ڽ��ַ������벢�������� URL �����󲿷֣�ͬʱ�������ڽ��������ݸ���һҳ���﷨ string urlencode ( string $str )
		//http://tieba.baidu.com/f?ie=utf-8&kw=%E7%BE%8E%E5%A5%B3
		//http://tieba.baidu.com/f?ie=utf-8&kw=%E7%BE%8E%E8%85%BF#/pn=50

		// ץȡ�����б�ҳ��HTML

		$html_list = get_html($tb_list);

		// ƥ������

		preg_match_all("/j_threadlist_li_right.+?href=\"\/p\/(\d+?)\" title=\"(.+?)\".+?tb_icon_author \"\>\<a.*?\>(.+?)\<\/a\>/ms",
			$html_list, $preg_list);
		//preg_match_all,�ַ�������ȶԽ���.�﷨: int preg_match_all(string pattern, string subject, array matches, int [order]);

		// ��������

		$ts = array();

		foreach ($preg_list[1] as $key => $val) {

			$ts[] = array(

				'id' => $val,

				'title' => $preg_list[2][$key],

				'author' => $preg_list[3][$key],

			);

		}

		// ��������

		foreach ($ts as $t) {

			$t_id = $t['id'];

			$t_title = $t['title'];

			$t_author = $t['author'];

			echo "{$green}{$tb['en']} P{$p}: $t_title{$end}\n";

			// ����Ƿ��Ѿ����ع�

			if (get_log($t_id)) {

				echo "{$red}fetched. skip.{$end}\n\n";

				continue;

			}

			// ץȡ��һҳHTML

			$t_url = "http://tieba.baidu.com/p/{$t_id}?see_lz=1";

			echo "get page: $t_url\n";

			$t_html = get_html($t_url);

			// ��ȡ���ҳ��

			preg_match("/pn=(\d*?)\"\>βҳ\<\/a\>.\<\/li\>/ms", $t_html, $preg_page);

			$page_max = isset($preg_page[1]) ? $preg_page[1] : 1;

			// ·����¥��

			if ($page_max > 10) {

				echo "{$red}max page: {$page_max}. skip.{$end}\n\n";

				continue;

			}

			// �ϲ�����ҳ��HTML

			$t_all_html = $t_html;

			for ($i = 2; $i <= $page_max; $i++) {

				$t_url_page = "{$t_url}&pn={$i}";

				echo "get page: $t_url_page\n";

				$t_all_html .= get_html($t_url_page);

			}

			preg_match_all("/\<cc id=\"post_content_.+?\">(.*?)<\/cc\>/ms",

				$t_all_html, $preg_t);

			$post = implode($preg_t[1]);

			// ƥ��ͼƬ

			$img_num = preg_match_all("/\<img.*?src=\"(https:\/\/imgsa.baidu.com\/forum\/.+?\/sign=\/.+?\/.+?)\".*?>/ms", $post, $preg_img);

			// ����ͼƬ

			if ($img_num >= $img_l) {

				$t_dir = $img_dir . $tb['en'] . date("/Ym/d/") . $t_id . '/'; // ����ͼƬ�洢Ŀ¼

				echo "dir: $t_dir\n";

				@mkdir($t_dir, 0755, TRUE);

				file_put_contents($t_dir . 'title.txt', $t_title); // д����⵽�ı��ļ�

				foreach ($preg_img[1] as $img) {

					get_img($img, $t_dir);

					echo "$img\n";

				}

			} else {

				echo "{$red}$img_num img. skip.{$end}\n";

			}

			set_log($t_id);

			echo "\n";

		}

	}

}

// ץȡURL HTML

function get_html($url) {

	while (true) {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 3);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		curl_setopt($ch, CURLOPT_USERAGENT,
			"Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");

		curl_setopt($ch, CURLOPT_COOKIE, "TIEBAPB=OLDPB");

		$html = curl_exec($ch);

		curl_close($ch);

		if (!empty($html)) {

			return $html;

		}

		sleep(1);

	}

}

function get_img($img, $dir) {

	$cmd = "/usr/bin/wget -c -t 3 -T 3 {$img} -P '$dir' > /dev/null 2>&1";

	shell_exec($cmd);

}

function set_log($id) {

	$log_dir = '/var/log/tbimg/';

	!file_exists($log_dir) && mkdir($log_dir);

	touch($log_dir . $id);

}

function get_log($id) {

	$log_dir = '/var/log/tbimg/';

	if (file_exists($log_dir . $id)) {

		return TRUE;

	} else {

		return FALSE;

	}

}