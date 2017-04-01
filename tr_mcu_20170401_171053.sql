-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "tr_mcu" -----------------------------------
CREATE TABLE `tr_mcu` ( 
	`id_mcu` BigInt( 20 ) AUTO_INCREMENT NOT NULL,
	`id_anggota` BigInt( 20 ) NULL,
	`tgl_mcu` Date NULL,
	`grade` Char( 5 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`process_status` Char( 1 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`tinggi_badan` Int( 11 ) NOT NULL,
	`berat_badan` Int( 11 ) NOT NULL,
	`tekanan_darah` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`gigi` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`jantung` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`paru` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`hati` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`limpah` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`mata_vod` VarChar( 7 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`mata_vos` VarChar( 7 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`mata_voo` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`mata_keterangan` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`warna` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`telinga` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`hidung` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`radiologi_thorax` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`radiologi_ecg` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
	`hb` Double( 22, 0 ) NOT NULL DEFAULT '0',
	`kimia_sgot` Int( 255 ) NOT NULL,
	`kimia_sgpt` Int( 255 ) NOT NULL,
	`kimia_creatinin` Double( 22, 0 ) NOT NULL DEFAULT '0',
	`kimia_ureum` Double( 22, 0 ) NOT NULL DEFAULT '0',
	`kimia_glukosa` Int( 255 ) NOT NULL,
	`kimia_cholesterol_total` Int( 255 ) NOT NULL,
	`kimia_cholesterol_trigliserida` Int( 255 ) NOT NULL,
	`kimia_uric` Double( 22, 0 ) NOT NULL DEFAULT '0',
	`gol_darah` VarChar( 2 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`umur` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id_mcu` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 22;
-- ---------------------------------------------------------


-- CREATE INDEX "fk_anggota" -------------------------------
CREATE INDEX `fk_anggota` USING BTREE ON `tr_mcu`( `id_anggota` );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


