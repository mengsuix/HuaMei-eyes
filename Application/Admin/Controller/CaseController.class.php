<?php
namespace Admin\Controller;
use Think\Controller;
class CaseController extends Controller {
	public function index(){	


		$data = array(
//			'status' => '1',
		);
		$pageSize = 5;
//		当前页
		$page = $_GET['p']?$_GET['p']:1;
		$userLists = D('case')->getAdminLists($data,$page,$pageSize);
		$userCount = D('case')->getAdminCount($data);
//		传入总数和页大小
		$Page       = new \Think\Page($userCount,$pageSize);
		$show       = $Page->show();
		$this->assign('userLists',$userLists);
		$this->assign('id',1);
		$this->assign('show',$show);
		
		$this->display();

	}
	public function upload()
	{
		$name = $_POST['name'];
		$age = $_POST['age'];
		$school = $_POST['school'];
		$zl = $_POST['zl'];
		$time = time();
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath  =      '/Uploads/'; // 设置附件上传目录// 上传文件
		$info   =   $upload->upload();
		if(!$info)
		{// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{
			// 上传成功 获取上传文件信息
			foreach($info as $file){
				$pic = $file['savepath'].$file['savename'];
			}
			$cc = D('case') ->getadd($pic,$time,$age,$name,$school,$zl);
			if($cc){
				$this->success('上传成功！');
				$this->redirect('case/index');
			}
		}
	}

	public function del(){
		$id = $_POST['id'];
		D('case') -> del($id);
		echo 1;
	}

	public function save(){
		$id = $_GET['id'];
		$save = D('case')->getTameById($id);
		$this->assign('save',$save);
		$this->display();

	}

	public function sav()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$school = $_POST['school'];
		$zl = $_POST['zl'];
		$time = time();
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath  =      '/Uploads/'; // 设置附件上传目录// 上传文件
		$info   =   $upload->upload();
		if(!$info)
		{// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{
			// 上传成功 获取上传文件信息
			foreach($info as $file){
				$pic = $file['savepath'].$file['savename'];
			}
			$cc = D('case') ->save($pic,$time,$age,$name,$school,$zl,$id);
			if($cc){
				$this->success('上传成功！');
				$this->redirect('case/index');
			}
		}
	}



}