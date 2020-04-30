-- Table structure for table `tblusers` 
--
CREATE TABLE IF NOT EXISTS `tblcatatuang` (
	`id` int (11) NOT NULL,
	`Jumlah_Uang` int (150) NOT NULL,
	`Keterangan` varchar (150) NOT NULL,
	`Kategori` varchar (120) NOT NULL,
	`Tanggal_Waktu` datetime (11) NOT NULL,
	`Posting_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE =InnoDB DEFAULT CHARSET =latin1;
-- Indexes for table `tblusers`
--
ALTER TABLE `tblcatatuang`
	ADD PRIMARY KEY (`id`);
-- AUTO_INCREMENT for dumped tables
-- AUTO_INCREMENT for table `tblcatatuang`
--
ALTER TABLE `tblusers`
	MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;