<?php
require "requres.php";
require "baglanti.php";

if (isset($gonder)) {
    if (isset($ked) && isset($kad) && isset($ks) && isset($firma)) {
        $kked = htmlspecialchars($ked);
        $kkad = htmlspecialchars($kad);
        $kfirma = htmlspecialchars($kfirma);

        if (strlen($ks) < 8) {
            echo "Şifreniz en az 8 karakter uzunluğunda olmalıdır.";
        } else {
            if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $ks)) {
                $sifre = password_hash($ks, PASSWORD_DEFAULT);
                $kked = htmlspecialchars($ked);
                $kkad = htmlspecialchars($kad);
                $kfirma = htmlspecialchars($kfirma);



                $stmt = $baglanti->prepare("INSERT INTO tablo_adi (sutun1, sutun2, sutun3) VALUES (:deger1, :deger2, :deger3)");

                $stmt->bindParam(':deger1', $deger1);
                $stmt->bindParam(':deger2', $deger2);
                $stmt->bindParam(':deger3', $deger3);

                $deger1 = "değer1";
                $deger2 = "değer2";
                $deger3 = "değer3";

                $stmt->execute();
            } else {
                echo "Şifreniz en az bir büyük harf, bir küçük harf ve bir rakam içermelidir.";
            }
        }
    } else {
        echo "Hata: boşluk var";
    }
} else {
    echo "Hata: gonder değişkeni tanımlı değil";
}
