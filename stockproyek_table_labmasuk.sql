
-- --------------------------------------------------------

--
-- Table structure for table `labmasuk`
--
-- Creation: Jul 06, 2021 at 07:20 AM
-- Last update: Jul 13, 2021 at 12:07 AM
--

CREATE TABLE `labmasuk` (
  `iduser` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labmasuk`
--

INSERT INTO `labmasuk` (`iduser`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(19, 1, '2021-07-10 01:39:36', 'Zahra', 100),
(23, 5, '2021-07-13 00:06:57', 'Jaemin', 20),
(24, 4, '2021-07-13 00:07:27', 'Jeno', 7);
