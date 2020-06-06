-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 06 Ιουν 2020 στις 19:33:57
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `epignosis`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `requests`
--

CREATE TABLE `requests` (
  `req_id` int(11) NOT NULL,
  `req_submitted` date NOT NULL,
  `req_start` date NOT NULL,
  `req_end` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `req_reason` text NOT NULL,
  `req_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `requests`
--

INSERT INTO `requests` (`req_id`, `req_submitted`, `req_start`, `req_end`, `user_id`, `req_reason`, `req_status`) VALUES
(10, '2020-06-06', '2020-06-07', '2020-06-21', 1, 'Exams', 'approved'),
(11, '2020-06-06', '2020-06-27', '2020-07-12', 1, 'Trip to Canada', 'rejected');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `type`, `created_at`, `email`) VALUES
(1, 'Karl', 'Zafiris', '66b65567cedbc743bda3417fb813b9ba', 'user', '2020-06-06', 'karlzafiris@gmail.com'),
(2, 'George', 'Willshorth', '66b65567cedbc743bda3417fb813b9ba', 'admin', '2020-06-06', 'gwills@gmail.com'),
(4, 'Rober', 'Jade', '77e1f7c5df4298cdfdc08f6e40194f27', 'user', '2020-06-06', 'robert@gmail.com');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
