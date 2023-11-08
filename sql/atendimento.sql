SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atendimento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(220) COLLATE latin1_general_ci DEFAULT NULL,
  `contato` varchar(220) COLLATE latin1_general_ci DEFAULT NULL,
  `cnpj` varchar(220) COLLATE latin1_general_ci DEFAULT NULL,
  `cliente` varchar(1000) COLLATE latin1_general_ci DEFAULT NULL,
  `incidente` varchar(5000) COLLATE latin1_general_ci DEFAULT NULL,
  `chamado` varchar(220) COLLATE latin1_general_ci DEFAULT NULL,
  `solucao` varchar(5000) COLLATE latin1_general_ci DEFAULT NULL,
  `acessoremoto` varchar(220) COLLATE latin1_general_ci DEFAULT NULL,
  `dataatual` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
