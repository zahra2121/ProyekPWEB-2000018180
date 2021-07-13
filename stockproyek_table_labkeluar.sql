
-- --------------------------------------------------------

--
-- Table structure for table `labkeluar`
--
-- Creation: Jul 06, 2021 at 07:25 AM
-- Last update: Jul 13, 2021 at 12:08 AM
--

CREATE TABLE `labkeluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labkeluar`
--

INSERT INTO `labkeluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(9, 5, '2021-07-11 02:31:24', 'Luca', 1),
(10, 5, '2021-07-13 00:08:01', 'Bruno', 1);
