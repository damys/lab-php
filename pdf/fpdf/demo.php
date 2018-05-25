<?php
	require 'chinese.php';
	
	class PDF extends PDF_Chinese
	{
		function Header(){
			$this->SetFont('simhei','',10);
			$this->Write(10,iconv("UTF-8","gbk",'这是页眉------'));
			$this->Ln(20);
		}
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('simhei','',10);
			$this->Cell(0,10,iconv("UTF-8","gbk",'这是页脚------'));
		}
	}
	$pdf = new PDF('P','mm','A4');
	
	
#	$pdf = new PDF_Chinese();
    $pdf->AddGBFont('simhei', '黑体');
    $pdf->AddPage();
    $pdf->SetFont('simhei', '', 13);

    //自动换行
    $pdf->MultiCell(190,10,iconv("utf-8","gbk","中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行中文自动换行"));

    //显示一格
    $pdf->Cell(40,10,iconv("utf-8","gbk","第一个单元格"));
    $pdf->Ln();//换行
    $pdf->Cell(40,10,iconv("utf-8","gbk","第二个单元格"));
    $pdf->Ln();//换行

    //输出表格
    //Cell方法最后一个参数表示是否显示边框
    $pdf->Cell(60,10,iconv("utf-8","gbk","姓名"),1);
    $pdf->Cell(60,10,iconv("utf-8","gbk","性别"),1);
    $pdf->Ln();
    $pdf->Cell(60,10,iconv("utf-8","gbk","张三"),1);
    $pdf->Cell(60,10,iconv("utf-8","gbk","男"),1);
    $pdf->Ln();
    $pdf->Cell(60,10,iconv("utf-8","gbk","李四"),1);
    $pdf->Cell(60,10,iconv("utf-8","gbk","女"),1);
    $pdf->Ln();

    $pdf->Cell(60,10,iconv("utf-8","gbk","<h1>不支持html tag</h1>"));
    $pdf->Ln();

    //插入图片
    //Image参数：文件，x坐标，y坐标，宽，高
    $pdf->Image('demo.jpg',null,null,100,52);
	
    $pdf->Output();//直接输出，即在浏览器显示
    $pdf->Output('demo.pdf','F');//保存为example.pdf文件
