
-- --------------------------------------------------------

--
-- Table structure for table `llogin`
--
-- Creation: Jul 06, 2021 at 07:14 AM
--

CREATE TABLE `llogin` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `llogin`
--

INSERT INTO `llogin` (`iduser`, `email`, `password`) VALUES
(1, 'hikmatuzzahra@gmail.com', '12345'),
(2, 'jara@gmail.com', '13524');
