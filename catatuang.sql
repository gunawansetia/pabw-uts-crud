
	CREATE TABLE IF NOT EXISTS `tblcatatuang` (
	`id_catat` int (11) NOT NULL,
	`jumlah_uang` decimal (65,2) NOT NULL,
	`keterangan` varchar (150),
	`kategori` varchar (120) NOT NULL,
	`tanggal` date,
	`gambar` blob,
	`posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP) ENGINE =InnoDB DEFAULT CHARSET =latin1;

ALTER TABLE `tblcatatuang`
	ADD PRIMARY KEY (`id_catat`);


ALTER TABLE `tblcatatuang`
	MODIFY `id_catat` int (11) NOT NULL AUTO_INCREMENT;

	-- Table structure for table `tblusers` 

CREATE TABLE IF NOT EXISTS `tblusers` (
	`id_user` int (11) NOT NULL,
	`yourname` varchar (255) NOT NULL,
	`username` varchar (255) NOT NULL,
	`password` varchar (225) NOT NULL,
	`email`	varchar (225) NOT NULL,
	`PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE =InnoDB DEFAULT CHARSET =latin1;
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
	ADD PRIMARY KEY (`id_user`);

	ALTER TABLE `tblusers`
	MODIFY `id_user` int (11) NOT NULL AUTO_INCREMENT;


