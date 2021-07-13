
--
-- Indexes for dumped tables
--

--
-- Indexes for table `labkeluar`
--
ALTER TABLE `labkeluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `labmasuk`
--
ALTER TABLE `labmasuk`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `labstock`
--
ALTER TABLE `labstock`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `llogin`
--
ALTER TABLE `llogin`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labkeluar`
--
ALTER TABLE `labkeluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `labmasuk`
--
ALTER TABLE `labmasuk`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `labstock`
--
ALTER TABLE `labstock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `llogin`
--
ALTER TABLE `llogin`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
