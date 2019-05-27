<?php 
require '../inc/fpdf181/fpdf.php';
$db = new PDO('mysql:host=localhost;dbname=kasir','root','akwan');

class myPDF extends FPDF
{
	
	function header()
	{
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5, 'RESTORANKU', 0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'Jl. Kerajalembah',0,0,'C');
		$this->Ln(20);
	}
	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable()
	{
		$this->SetFont('Times','B',12);
		$this->Cell(20,10,'No',1,0,'C');
		$this->Cell(90,10,'Nama User',1,0,'C');
		$this->Cell(80,10,'Tanggal',1,0,'C');
		$this->Cell(90,10,'Total Bayar',1,0,'C');

		$this->Ln();
	}
	function viewTable($db)
	{
		$this->SetFont('Times','',12);
		$no=1;
		$total_pemasukan = 0;
		$ambil = $db->query("SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user");
        while($data = $ambil->fetch(PDO::FETCH_OBJ)){
	        $this->Cell(20,10,$no++,1,0,'C');
			$this->Cell(90,10,$data->nama_user,1,0,'C');
			$this->Cell(80,10,$data->tanggal,1,0,'C');
			
			$this->Cell(90,10,number_format($data->total_bayar),1,0,'C');
			$tp= $total_pemasukan+=$data->total_bayar;
			$this->Ln();
		}
		$this->Cell(280,10,number_format($tp),1,0,'C');
	}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();

 ?>