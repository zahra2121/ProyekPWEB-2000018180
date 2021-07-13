
-- --------------------------------------------------------

--
-- Table structure for table `labstock`
--
-- Creation: Jul 06, 2021 at 07:22 AM
-- Last update: Jul 13, 2021 at 12:08 AM
--

CREATE TABLE `labstock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labstock`
--

INSERT INTO `labstock` (`idbarang`, `namabarang`, `deskripsi`, `stock`) VALUES
(1, 'Laptop ASUS', 'Laptop', 200),
(4, 'Laptop HP', 'Laptop', 97),
(5, 'Kabel', 'Alat', 38),
(7, 'Hardisk 1TB', 'Alat', 10),
(8, 'RAM', 'Alat', 10);
