-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2024 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_metrics`
--

CREATE TABLE `activity_metrics` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `workout_type` varchar(10) NOT NULL,
  `weight` float NOT NULL,
  `intensity` float NOT NULL,
  `duration` float NOT NULL,
  `calories_burned` float NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_metrics`
--

INSERT INTO `activity_metrics` (`id`, `user_id`, `workout_type`, `weight`, `intensity`, `duration`, `calories_burned`, `datetime`) VALUES
(1, 1, 'running', 100, 1.5, 10, 20, '2024-09-19 15:56:49'),
(2, 1, 'cycling', 100, 1, 123, 0.813008, '2024-09-19 16:11:46'),
(3, 1, 'walking', 100, 1.25, 3232, 0.0225608, '2024-09-19 16:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advice`
--

INSERT INTO `advice` (`id`, `user_id`, `message`, `datetime`) VALUES
(2, 1, 'It\'s awesome that you\'re setting fitness goals and tracking your progress! Let\'s look at your data and see what we can do to help you reach your goal.\n\n**Workout Analysis**\n\n* **Good:**  You\'ve already started logging your workouts, which is a great first step! \n* **To Improve:**\n    * **Consistency:** Your current log shows only one day of activity. Aim for daily workouts, even if they are short, to build a consistent routine.\n    * **Variety:** Your log includes running, cycling, and walking. This is great, keep it up! \n    * **Intensity:**  While you have logged intensity for some workouts, it\'s important to track it for *all* workouts. Aim for a balance between higher intensity days and recovery days.\n    * **Distance:** The goal of 4km in 5 days is achievable.  Start by walking or running for shorter distances and gradually increase the distance over time. You might want to split your 4km goal into smaller daily goals.\n    * **Time:** It\'s good that you\'re tracking the duration of your workouts. Make sure the duration is sufficient for a good workout.\n\n**Nutrition Analysis**\n\n* **Good:** You\'re tracking your food intake. This is crucial for supporting your workouts and achieving your fitness goals.\n* **To Improve:**\n    * **Calorie Intake:** It\'s important to understand your daily calorie needs based on your activity level and goals.  A calorie deficit is necessary for weight loss.  However, if your goal is simply to increase your fitness, you may need to adjust your calorie intake accordingly. \n    * **Macronutrient Balance:** Your last meal was high in protein and fats, which is a good start. Aim for a balanced diet with adequate protein, carbohydrates, and healthy fats.  \n    * **Hydration:**  Drinking enough water is essential for overall health and workout performance.\n\n**Words of Encouragement**\n\nYou are on the right track! You have a clear goal, you are tracking your progress, and you are making an effort to improve.  Remember that fitness is a journey, not a race.  Be kind to yourself, be patient, and keep pushing forward.  You can achieve your goals!\n\n**Actionable Advice**\n\n1. **Set Smaller Goals:** Instead of aiming for 4km in one day, break it down into manageable daily goals, such as 1km each day, increasing as you feel stronger.\n2. **Create a Schedule:** Schedule your workouts into your week, making sure to include at least one rest day.\n3. **Experiment with Intensity:** Mix up your workouts with higher intensity days (running or interval training) and recovery days (walking or light cycling). \n4. **Fuel Your Body:** Ensure you\'re eating a balanced diet that provides the nutrients you need for your workouts.  Focus on whole foods, lean proteins, and healthy carbohydrates.\n5. **Stay Hydrated:** Drink plenty of water throughout the day, especially before, during, and after workouts.\n\n**Tips for Success**\n\n* **Find a Workout Buddy:** Training with a friend can make it more enjoyable and help keep you motivated.\n* **Listen to Your Body:** If you\'re feeling tired or sore, take a break. Rest is essential for recovery and preventing injuries.\n* **Track Your Progress:** Monitor your workouts, distance, and nutrition to see how you are progressing. \n* **Celebrate Small Victories:** Reward yourself for reaching milestones to stay motivated.\n\nWith dedication, effort, and a little bit of patience, you will reach your fitness goals! \n', '2024-09-22 12:41:39'),
(3, 1, 'It\'s great you\'re setting fitness goals! You\'re already off to a good start with your activity tracking and nutrition logging. Let\'s take a look at your data and get you on the right track:\n\n**Workout Analysis:**\n\n* **Good:** You\'re logging your workouts which is fantastic! You\'re also trying different types of exercise, which is great for overall fitness.\n* **Improvement:** \n    * **Consistency:** You only have a few workouts logged so far. Aim for daily or almost daily activity. Even short walks (15-20 minutes) count!\n    * **Variety:** You\'ve done running, cycling, and walking.  Try incorporating strength training (bodyweight exercises, weights, or resistance bands) to build muscle and boost metabolism. \n    * **Challenge Yourself:** Consider gradually increasing the distance or intensity of your workouts to see consistent progress.\n    * **Goal-Oriented:** You\'re aiming for 4km in 5 days. Break this down into smaller, achievable daily goals.\n\n**Nutrition Analysis:**\n\n* **Good:** You\'re paying attention to your calorie, protein, carbs, and fats. This shows you\'re being mindful of your nutrition.\n* **Improvement:** \n    * **Calorie Needs:** You\'re focusing on protein and fats but haven\'t mentioned your overall calorie intake. Determine your daily calorie needs (you can find online calculators) to fuel your workouts and build muscle. \n    * **Balanced Diet:** Aim for a balanced diet with plenty of fruits, vegetables, lean protein, and whole grains. This will provide you with essential nutrients and energy.\n    * **Hydration:**  Drink plenty of water throughout the day, especially when you\'re working out.\n    * **Meal Planning:**  Pre-plan meals and snacks to avoid unhealthy choices. \n\n**Can you reach your goal?**\n\nBased on your current data, it\'s hard to say definitively. You\'ve only logged a few workouts and haven\'t provided your calorie needs or overall nutrition plan. Here\'s how you can increase your chances:\n\n1. **Set Realistic Goals:**  Walking/running 4km in 5 days is achievable if you build up gradually and maintain a consistent routine. \n2. **Gradually Increase Distance:** Start with shorter distances and slowly increase them over the days leading up to your goal.\n3. **Prioritize Rest:**  Allow your body to rest and recover between workouts.\n4. **Listen to your Body:** If you feel any pain, stop and rest. \n5. **Fuel Your Workouts:**  Make sure you\'re consuming enough calories and the right nutrients to support your workouts. \n\n**Words of Encouragement:**\n\nYou\'re already taking great steps towards a fitter you! Be patient with yourself and focus on consistency. Every small step counts. Remember, progress is not always linear, but with dedication, you can reach your goals.  \n\n**Key Takeaways:** \n\n* Be consistent with your workouts (aim for daily or almost daily).\n* Gradually increase the intensity and duration of your exercise.\n* Prioritize a balanced diet and adequate hydration.\n* Track your calories and macronutrients (protein, carbs, fats).\n* Break down your goal into smaller, manageable steps.\n* Be patient with yourself and celebrate your achievements.\n\n**With the right approach, you can absolutely reach your 4km goal!** \n', '2024-09-22 12:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `goal_type` set('Weight Loss','Workout','Distance','Calories Burned') NOT NULL,
  `target_value` float NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL,
  `status` set('In Progress','Completed','Failed') NOT NULL DEFAULT 'In Progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `user_id`, `goal_type`, `target_value`, `start_date`, `end_date`, `status`) VALUES
(1, 1, 'Weight Loss', 100, '2024-09-21 08:36:19', '2024-09-30', 'Completed'),
(5, 1, 'Distance', 4, '2024-09-22 11:00:23', '2024-09-27', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_logs`
--

CREATE TABLE `nutrition_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `calories` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `carbohydrate` int(11) NOT NULL,
  `fats` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nutrition_logs`
--

INSERT INTO `nutrition_logs` (`id`, `user_id`, `food_name`, `calories`, `protein`, `carbohydrate`, `fats`, `datetime`) VALUES
(1, 1, 'Bread', 100, 56, 10, 9, '2024-09-21 17:26:08'),
(2, 1, 'Rice and Stew', 10, 10, 10, 10, '2024-09-21 18:34:17'),
(3, 1, 'Beans', 10, 10, 10, 10, '2024-09-22 05:02:16'),
(19, 1, 'Egg Sauce and Plantain', 2, 10, 2, 3, '2024-09-22 11:02:03'),
(20, 1, 'Banana and Eggs', 1, 1, 1, 1, '2024-09-22 11:03:14'),
(21, 1, 'ewr', 0, 23, 2, 23, '2024-09-22 11:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `loginkey` varchar(60) CHARACTER SET gb2312 COLLATE gb2312_chinese_nopad_ci DEFAULT NULL,
  `role` set('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `weight`, `height`, `password`, `loginkey`, `role`) VALUES
(1, 'Prime Okanlawon', 'oyedelenewton@gmail.com', 100, 100, '$2y$10$93Eo3x6ByPUUu4WA8SE6quKq11gu1hammI5X9ixfKoJ1DmVaFkXdS', '$2y$10$CwPZiRNdRiHrTmvlyoRLq.pingRIKtVzKQgM1XpIIDTs6f47Ebkm6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_metrics`
--
ALTER TABLE `activity_metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition_logs`
--
ALTER TABLE `nutrition_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_metrics`
--
ALTER TABLE `activity_metrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nutrition_logs`
--
ALTER TABLE `nutrition_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
