<?php


/* Sorgularla ilgili fonksiyonlar*/


// tanımlar ve değişkenler
global $db;
global $VT_Master;
global $con;

$sabit=[
    "Id"=>"",
    "Durum"=>0,
    "AnaHesapId"=>0,
     "MR10000000","INTERNET","INTERNET","YETKİLİ",NULL,2,2,"TL","INTERNET UZERİNDEN YAPILAN SATIŞLAR",27427,"FATURA ADRESİ","SEVK ADRESİ",]
//-----------------------


function Cariler()
{
    $fonksiyonAdi = "Cariler";
    global $db;
    $SorguDegiskeni1 = $db->prepare("SELECT * FROM Cariler");
    $SorguDegiskeni1->execute(array());
    $SorguDegiskeni = $SorguDegiskeni1->fetchAll(PDO::FETCH_ASSOC);


    //program bittiğinde alttaki satıralrı yoruma çekelim!.
    // echo "<pre>";
    // echo "<br>#######  '" . $fonksiyonAdi . "' FONKSİYON İÇİ BASKI  #########<br>";
    // print_r($SorguDegiskeni);
    // echo "<br>#######################################################";
    // echo "</pre>";
    return $SorguDegiskeni;
}


function Stoklar()
{
    global $db;

    $fonksiyonAdi = "Stoklar";

    $SorguDegiskeni1 = $db->prepare("SELECT * FROM Stoklar");
    $SorguDegiskeni1->execute(array());
    $SorguDegiskeni = $SorguDegiskeni1->fetchAll(PDO::FETCH_ASSOC);


    //program bittiğinde alttaki satıralrı yoruma çekelim!.
    // echo "<pre>";
    // echo "<br>#######  '" . $fonksiyonAdi . "' FONKSİYON İÇİ BASKI  #########<br>";
    // print_r($SorguDegiskeni);
    // echo "<br>#######################################################";
    // echo "</pre>";
    return $SorguDegiskeni;
}


function CariEkle(){

    global $db;
    $cariEkle1=$db->prepare("INSERT INTO Cariler SET
Id=?,
Durum=0,
AnaHesapId=0,
Kodu='MR10000000',
Adi=?,
Unvani=?,
Yetkili=?,
DogumTarihi=?,
Tipi=?,
SubeId=?,
ParaBirimi=?,
Aciklama=?,
MahalleId=?,
FaturaAdresi=?,
SevkAdresi=?,
Telefon1=?,
Telefon2=?,
Faks=?,
GSM=?,
EMail=?,
WebAdresi=?,
VergiDairesi=?,
VergiNumarasi=?,
KrediLimiti=?,
AcikHesapLimiti=?,
Opsiyon=?,
Iskonto=?,
GecikmeFaizi=?,
AylikVade=?,
SatisYapilmasin=?,
TahsilatYapilmasin=?,
OzelKod1=?,
OzelKod2=?,
OzelKod3=?,
Tarih=?,
OrtalamaDevirTarihi=?,
ArtiPuan=?,
OtomasyonDisi=?,
SMSGonderme=?,
SenetNo=?,
BorcMuhKodId=?,
AlacakMuhKodId=?,
CarininPersoneli=?,
EFaturaKullanir=?,
AnneKSoyadi=?,
Mernis=?,
PersonelKartı=?,
SigortaliMusteri=?,
Cinsiyet=?,
YakininAdi=?,
YakininSoyadi=?,
SenediAldi=?,
SenediAldigiTarih=?,
SenediniIstiyor=?,
SenetSubeyeGonderildi=?,
YakinininTCKimlikNo=?

    ");
    $cariEkle1->execute(array(
Id
Durum
AnaHesapId
Kodu
Adi
Unvani
Yetkili
DogumTarihi
Tipi
SubeId
ParaBirimi
Aciklama
MahalleId
FaturaAdresi
SevkAdresi
Telefon1
Telefon2
Faks
GSM
EMail
WebAdresi
VergiDairesi
VergiNumarasi
KrediLimiti
AcikHesapLimiti
Opsiyon
Iskonto
GecikmeFaizi
AylikVade
SatisYapilmasin
TahsilatYapilmasin
OzelKod1
OzelKod2
OzelKod3
Tarih
OrtalamaDevirTarihi
ArtiPuan
OtomasyonDisi
SMSGonderme
SenetNo
BorcMuhKodId
AlacakMuhKodId
CarininPersoneli
EFaturaKullanir
AnneKSoyadi
Mernis
PersonelKartı
SigortaliMusteri
Cinsiyet
YakininAdi
YakininSoyadi
SenediAldi
SenediAldigiTarih
SenediniIstiyor
SenetSubeyeGonderildi
YakinininTCKimlikNo
        
    ));
    
}


function CariVarMi()
{

    $varmiSayaci = 0;

    //carilerden gelen bilgide "SANAL"Carisi var mı?
    $cariler = Cariler();
    foreach ($cariler as $satir) {
        if ($satir["Adi"] == KULLANICI) {
            $varmiSayaci = 1;
            break;
        }
    }

    
    // kayıtlı kullanıcı yoksa, kullanıcı oluştur. 
    if ($varmiSayaci == 0) {


    }






    return;
}
