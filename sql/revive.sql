-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 10:53 PM
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
-- Database: `revive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(15) NOT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `admin_pswd` varchar(200) DEFAULT NULL,
  `admin_dataloggedin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_pswd`, `admin_dataloggedin`) VALUES
(1, 'Amanda', 'amanda.nchks@gmail.com', '$2y$10$eX90ARwtHJMk5QAxbUGV2.LyxsgSNGp1mo3bhYbkaBSMVL0Cr5U16', '2024-05-03 01:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assess_id` int(11) NOT NULL,
  `user_wellbeing` enum('Good','Stressed/Tired','Sad','Indifferent') DEFAULT NULL,
  `sleep_habits1` enum('Less than 5hours','5hours','6-7hours','More than 7hours') DEFAULT NULL,
  `sleep_habits2` enum('Every hour or more','Frequently','Occassionally','Rarely') DEFAULT NULL,
  `stress_level` enum('Work or School','Health','Money','Family responsibilities','Relationships') DEFAULT NULL,
  `medical_conditions` enum('Yes','No') DEFAULT NULL,
  `medical_notes` varchar(300) DEFAULT NULL,
  `data_completed` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assess_id`, `user_wellbeing`, `sleep_habits1`, `sleep_habits2`, `stress_level`, `medical_conditions`, `medical_notes`, `data_completed`, `data_updated`, `user_id`) VALUES
(1, 'Good', 'Less than 5hours', 'Frequently', 'Money', 'Yes', 'Home Sick and Hungry', '2024-05-17 15:08:21', '2024-05-15 17:16:09', 1),
(2, 'Sad', 'Less than 5hours', 'Every hour or more', 'Money', 'No', 'None', '2024-05-21 06:46:16', '2024-05-21 06:46:16', 5),
(3, 'Good', '6-7hours', 'Occassionally', 'Relationships', 'No', 'None', '2024-05-21 11:26:14', '2024-05-21 11:26:14', 6),
(4, 'Indifferent', '6-7hours', 'Occassionally', 'Family responsibilities', 'Yes', 'Ulcer', '2024-05-21 16:01:00', '2024-05-21 16:01:00', 4),
(5, 'Stressed/Tired', 'Less than 5hours', 'Every hour or more', 'Family responsibilities', 'Yes', 'Ulcer', '2024-05-27 09:11:45', '2024-05-27 09:11:45', 7);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_image` varchar(300) NOT NULL,
  `blog_title` varchar(300) DEFAULT NULL,
  `blog_subtitle` varchar(500) DEFAULT NULL,
  `blog_category` enum('Stress','Sleep','Mental Health') NOT NULL,
  `blog_article` longtext DEFAULT NULL,
  `blog_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_image`, `blog_title`, `blog_subtitle`, `blog_category`, `blog_article`, `blog_date`) VALUES
(8, 'blog2.jpg', 'TIRED BUT WIRED?', '5 ways to overcome tiredness in the workplace.', 'Stress', '<div class=\"container2\" >  \r\n          <p class=\"article-text\" style=\"font-size:12px;\">Feeling sluggish and drained at work? You\'re not alone. Workplace fatigue is a common struggle, impacting focus, productivity, and overall well-being. But don\'t resign yourself to endless cups of coffee! Here are 5 effective strategies to combat tiredness and reclaim your energy at work:</p>\r\n    <br>\r\n    </div>\r\n            \r\n<br>\r\n      \r\n\r\n        <div class=\"container2\">\r\n          <h3 class=\"article-title\" style=\"font-size:18px;\">Conquering Tiredness at Work: 5 Strategies for Renewed Energy</h3>\r\n        <br>\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Prioritize Sleep Hygiene:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Consistent Sleep Schedule:</b><br>Train your body by going to bed and waking up at the same time each day, even on weekends. Consistency regulates your natural sleep-wake cycle (circadian rhythm) and promotes better sleep quality.</li>\r\n            <br>\r\n            <li><b>Relaxing Bedtime Routine: </b><br>Signal to your body it\'s time to unwind. Develop a calming routine that could include taking a warm bath, reading a book, or practicing relaxation techniques like deep breathing or meditation. Avoid stimulating activities like watching TV or using electronic devices for at least an hour before bed.</li>\r\n            <br> \r\n            <li><b>Optimize Your Sleep Environment:</b><br>Darkness, quiet, and cool temperatures are essential for restful sleep. Invest in blackout curtains, an earplug mask if necessary, and a comfortable mattress and pillows.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Power Up with Healthy Breaks:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Short Breaks Throughout the Day:</b><br>Fight the urge to power through long stretches. Take short breaks every 60-90 minutes to get your blood flowing and refresh your mind. Get up and move around, do some light stretches, or step outside for a breath of fresh air.</li>\r\n            <br>\r\n            <li><b>Hydration is Key:</b><br>Dehydration can significantly impact energy levels. Keep a reusable water bottle at your desk and sip water throughout the day. Aim for 8 glasses of water daily for optimal hydration.</li>\r\n            <br> \r\n            <li><b>Nourishing Snacks:</b><br>Avoid sugary snacks that lead to a crash. Opt for healthy, energy-boosting snacks like fruits, nuts, yogurt, or whole-grain crackers.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Manage Work Stress for Better Sleep:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Identify Stressors:</b><br>Workplace stress can significantly disrupt sleep. Pinpoint what\'s causing your stress (heavy workload, unrealistic deadlines, communication issues).</li>\r\n            <br>\r\n            <li><b>Develop Coping Strategies:</b><br>Once you identify stressors, explore ways to manage them. Can you delegate tasks? Communicate better with colleagues? Implement stress management techniques like deep breathing exercises or meditation before bed.</li>\r\n            <br> \r\n            <li><b>Disconnect to Reconnect with Sleep: </b><br>The blue light emitted from electronic devices disrupts sleep patterns. Establish screen-free zones, particularly your bedroom, and avoid work emails or social media for at least an hour before bed.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Make Movement Matter:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Incorporate Exercise:</b><br>Regular physical activity is a proven mood booster and can combat daytime fatigue. Engage in moderate-intensity exercise for at least 30 minutes most days of the week. Brisk walking, cycling, or even a short lunchtime workout can significantly improve energy levels.</li>\r\n            <br>\r\n            <li><b>Micro-Movements Throughout the Day:</b><br>Combat stiffness and fatigue by incorporating small movements throughout your workday. Stand up and stretch every hour, take the stairs instead of the elevator, or walk during phone calls.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Prioritize Your Well-being:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Listen to Your Body:</b><br>Fatigue can be a sign of underlying health issues. If you\'re consistently tired despite practicing good sleep hygiene and stress management, consult a doctor to rule out any medical conditions.</li>\r\n            <br>\r\n            <li><b>Schedule Time for Yourself:</b><br>Don\'t let work consume your life. Schedule time for hobbies, social activities, or simply relaxing. Engaging in activities you enjoy helps manage stress and promotes better sleep.</li>\r\n            <br> \r\n            <li><b>Seek Support: </b><br>Don\'t hesitate to seek help. Talk to a trusted colleague, friend, or a therapist about your fatigue. Consider seeking professional guidance from a sleep specialist or counselor.</li>\r\n          </ol>\r\n    </div>\r\n    <br><br>', '2024-05-05'),
(9, 'sleeping.jpg', 'THE POWER OF SLEEP:', 'Why You Should Prioritize Rest for Overall Well-being - A Deep Dive', 'Sleep', '<div class=\"container2\" >  \r\n          <p class=\"article-text\" style=\"font-size:12px;\">Ever feel like you\'re constantly running on fumes? Struggling to focus at work? Feeling irritable and moody? You\'re not alone. Millions grapple with the consequences of chronic sleep deprivation. But what if the key to unlocking your full potential, both physically and mentally, resided in a simple act: prioritizing sleep?.</p>\r\n    <br>\r\n        <p class=\"article-text\" style=\"font-size:12px;\">Sleep isn\'t just a luxury - it\'s a biological necessity. During sleep, our bodies and minds undergo a complex restorative process essential for optimal health and well-being. Let\'s delve into the science behind why sleep is your superpower for a happier, healthier you.</p>\r\n    </div>\r\n            \r\n<br>\r\n      \r\n\r\n        <div class=\"container2\">\r\n          <h3 class=\"article-title\" style=\"font-size:18px;\">Benefits of Sleep: A Symphony of Restoration</h3>\r\n       \r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Sharpen Your Mind:</b><br> Think of sleep as a brain gym. While you slumber, your brain consolidates memories, allowing you to learn and retain information more effectively. Sleep strengthens neural connections, fostering sharper thinking, improved problem-solving skills, and enhanced creativity. Imagine waking up feeling alert and ready to tackle any mental challenge!</li>\r\n            <br>\r\n            <li><b>Emotional Balance:</b><br>Sleep is the body\'s emotional reset button. When sleep deprived, our brains struggle to regulate neurotransmitters like serotonin and dopamine, crucial for mood stability. This can lead to increased irritability, anxiety, and even symptoms of depression. Prioritizing sleep helps maintain emotional equilibrium, allowing you to navigate life\'s challenges with greater resilience.</li>\r\n            <br> \r\n            <li><b>Physical Rejuvenation:</b><br> Sleep isn\'t just for the mind; it\'s vital for physical health. During sleep, our bodies repair tissues, build muscle, and boost the immune system. Growth hormone, essential for cell regeneration and tissue repair, is primarily released during deep sleep stages. Adequate sleep also helps regulate hormones like insulin and leptin, which play a significant role in metabolism and weight management.</li>\r\n            <br>\r\n            <li><b>Supercharge Your Energy:</b><br>Feeling sluggish throughout the day? Sleep deprivation zaps your energy reserves. During sleep, the body produces less of the stress hormone cortisol and more of the human growth hormone (HGH), which promotes energy production. A good night\'s sleep leaves you feeling refreshed, revitalized, and ready to conquer the day.</li>\r\n          </ol>\r\n    </div>\r\n    <br>\r\n\r\n    <div class=\"container2\">\r\n          <h3 class=\"article-title\" style=\"font-size:18px;\">Consequences of Sleep Deprivation: The Downward Spiral</h3>\r\n       \r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Cognitive Decline:</b><br>When sleep deprived, our cognitive abilities suffer. Imagine struggling to remember simple tasks, experiencing difficulty concentrating, and making poor decisions. Sleep deprivation impairs memory, reasoning, and reaction time, impacting work performance and daily life.</li>\r\n            <br>\r\n            <li><b>Emotional Rollercoaster: </b><br> Sleep deprivation disrupts the delicate balance of neurotransmitters in the brain. This can lead to heightened emotional responses, increased irritability, and difficulty managing stress. Feeling on edge and easily frustrated are telltale signs of sleep deprivation\'s impact on your emotional well-being.</li>\r\n            <br> \r\n            <li><b>Weakened Immunity:</b><br>Constant sleep deprivation weakens your body\'s natural defenses. The immune system produces infection-fighting cells and antibodies primarily during sleep. Insufficient sleep makes you more susceptible to illnesses like the common cold and flu.</li>\r\n            <br>\r\n            <li><b>Chronic Health Risks:</b><br> The long-term consequences of sleep deprivation are serious. Studies have linked chronic sleep deprivation to an increased risk of developing chronic conditions like heart disease, diabetes, and obesity. Prioritizing sleep is an investment in your long-term health.</li>\r\n          </ol>\r\n    </div>\r\n        <br>\r\n    <div class=\"container2\">\r\n          <h3 class=\"article-title\" style=\"font-size:18px;\">Prioritizing Sleep: Making Rest a Habit</h3>\r\n       \r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Embrace a Consistent Sleep Schedule:</b><br>Our bodies thrive on routine. Go to bed and wake up at the same time each day, even on weekends. This helps regulate your body\'s natural sleep-wake cycle (circadian rhythm) and promotes better sleep quality.</li>\r\n            <br>\r\n            <li><b>Craft a Relaxing Bedtime Routine:</b><br> Signal to your body that it\'s time to wind down. Develop a calming bedtime routine that might include taking a warm bath, reading a book, or practicing relaxation techniques like deep breathing or meditation. Avoid stimulating activities like watching TV or using electronic devices before bed.</li>\r\n            <br> \r\n            <li><b>Optimize Your Sleep Environment:</b><br>Create a sleep haven! Ensure your bedroom is dark, quiet, and cool. Invest in blackout curtains, an earplug mask if necessary, and a comfortable mattress and pillows.</li>\r\n            <br>\r\n            <li><b>Develop Healthy Sleep Habits:</b><br> Certain lifestyle choices can significantly impact your sleep quality. Avoid caffeine and alcohol close to bedtime, as they can interfere with sleep. Engage in regular exercise, but avoid strenuous workouts too close to bedtime. Maintain a healthy diet to ensure your body has the necessary resources for optimal sleep.</li>\r\n          </ol>\r\n    </div>\r\n\r\n    <br>\r\n    <div class=\"container2\">\r\n          <h3 class=\"article-title\" style=\"font-size:18px;\">Revive: Your Partner in Sleep</h3>\r\n            <p class=\"article-text\" style=\"font-size:12px;\">Revive understands the power of sleep and is here to help you prioritize rest for a healthier, happier you. Our app offers a variety of features designed to promote better sleep:</p>\r\n            <br>\r\n            <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Personalized Sleep Sounds:</b><br>Relaxing soundscapes can create a calming bedtime environment, masking distracting noises and promoting relaxation.</li>\r\n            <br> \r\n            <li><b>Guided Meditations:</b><br>Learn relaxation techniques to quiet your mind and prepare your body for sleep.</li>\r\n          </ol>\r\n    </div>\r\n    <br>\r\n    <div class=\"container2\" > \r\n    <h3 class=\"article-title\" style=\"font-size:18px;\">Invest in Sleep, Invest in Yourself</h3> \r\n          <p class=\"article-text\" style=\"font-size:12px;\">Prioritizing sleep isn\'t selfish; it\'s an investment in your overall well-being. By making sleep a priority, you\'re empowering yourself to function at your best physically, mentally, and emotionally. Remember, a good night\'s sleep is the foundation for a healthier, happier, and more fulfilling life. Download Revive today and embark on a journey towards a better tomorrow, one restful night at a time.</p>\r\n    <br>\r\n    </div>', '2024-04-10'),
(10, 'blog1b.jpg', 'INSOMNIA', 'Unraveling the Mystery: Understanding and Overcoming Insomnia', 'Sleep', '<div class=\"container2\" >  \r\n          <p class=\"article-text\" style=\"font-size:12px;\">Insomnia, the persistent inability to fall asleep or stay asleep, plagues millions worldwide. It disrupts your sleep cycle, leaving you feeling exhausted, irritable, and unable to function at your best. But fret not, for understanding the causes and remedies of insomnia is the first step towards a good night\'s rest.</p>\r\n    <br>\r\n    </div>\r\n            \r\n<br>\r\n      \r\n\r\n        <div class=\"container2\">\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">The Many Faces of Insomnia:</h3>\r\n          <br>\r\n          <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Acute Insomnia: </b><br>This short-term sleeplessness often arises due to stressful life events, travel across time zones, or changes in work schedules. It usually resolves on its own within a few nights.</li>\r\n            <br>\r\n            <li><b>Chronic Insomnia:</b><br>This long-term sleep disruption persists for at least 3 nights a week for 3 months. It significantly impacts daily life and can be caused by a variety of factors.</li>\r\n          </ul><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">The Culprits Behind Sleepless Nights:</h3>\r\n          <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Stress and Anxiety:</b><br>The worries and anxieties of daily life can keep your mind racing, making it difficult to switch off and fall asleep. Additionally, chronic stress disrupts the body\'s natural production of sleep-promoting hormones.</li>\r\n            <br>\r\n            <li><b>Medical Conditions: </b><br>Certain medical conditions like sleep apnea (interrupted breathing during sleep), chronic pain, and restless legs syndrome can significantly disrupt sleep patterns.</li>\r\n            <br> \r\n            <li><b>Mental Health Disorders: </b><br>Depression, anxiety disorders, and post-traumatic stress disorder (PTSD) can all contribute to insomnia. Sleep disturbances are often a symptom of these conditions.</li>\r\n            <br> \r\n            <li><b>Poor Sleep Habits: </b><br>Inconsistent sleep schedules, napping during the day, using electronic devices before bed, and an uncomfortable sleep environment can all contribute to insomnia.</li>\r\n          </ul><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:18px;\">Reclaiming Your Sleep Sanctuary: Effective Remedies for Insomnia</h3><br>\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Natural Sleep Hygiene Practices:</h3>\r\n          <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Develop a Consistent Sleep Schedule:</b><br>Go to bed and wake up at the same time each day, even on weekends. This helps regulate your body\'s natural sleep-wake cycle.</li>\r\n            <br>\r\n            <li><b>Create a Relaxing Bedtime Routine: </b><br>Wind down before bed with calming activities like taking a warm bath, reading a book, or practicing relaxation techniques such as deep breathing or progressive muscle relaxation.</li>\r\n            <br> \r\n            <li><b>Establish Healthy Sleep Habits: </b><br>Avoid caffeine and alcohol close to bedtime, as they can interfere with sleep. Engage in regular exercise, but avoid strenuous workouts too close to bedtime. Maintain a healthy diet and limit heavy meals before bed.</li>\r\n            <br> \r\n            <li><b>Embrace Sunlight During the Day: </b><br>Exposure to natural sunlight helps regulate your circadian rhythm, promoting better sleep at night.</li>\r\n          </ul><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Therapy and Behavioral Techniques:</h3>\r\n          <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Cognitive Behavioral Therapy for Insomnia (CBT-I): </b><br>This evidence-based therapy helps identify and change negative thoughts and behaviors that contribute to insomnia. It equips you with tools to develop healthy sleep habits and manage stress that disrupts sleep.</li>\r\n            <br>\r\n            <li><b>Relaxation Techniques: </b><br>Techniques like mindfulness meditation and deep breathing can help quiet a racing mind and promote relaxation before bed.</li>\r\n          </ul><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:17px;\">Revive: Your Partner on the Road to Better Sleep</h3>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">\r\n            Revive understands the challenges of insomnia and is here to support you on your journey towards better sleep. Our app offers a variety of features designed to promote healthy sleep habits and manage stress:</p>\r\n            \r\n            <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Sleep Tracking: </b>Monitor your sleep patterns and identify areas for improvement.</li>\r\n            <li><b>Personalized Sleep Sounds: </b>Relaxing soundscapes can create a calming bedtime environment.</li>\r\n            <li><b>Guided Meditations: </b>Learn relaxation techniques to quiet your mind and prepare your body for sleep.</li>\r\n            <li><b>Community Support: </b>Connect with others who are on their sleep journey and share experiences and tips.</li>\r\n          </ul>\r\n            <br>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">\r\n          Remember, insomnia doesn\'t have to be a life sentence. By understanding the causes, implementing effective remedies, and utilizing tools like Revive, you can reclaim your sleep sanctuary and wake up feeling refreshed and ready to conquer each day.</p>\r\n    </div>\r\n    <br><br>', '2024-05-01'),
(11, 'blog3.jpg', 'HOW TO RELIEVE STRESS & ANXIETY', 'Taming the Tiger: Effective Techniques to Relieve Stress and Anxiety', 'Mental Health', '<div class=\"container2\" >  \r\n          <p class=\"article-text\" style=\"font-size:12px;\">Stress and anxiety are unwelcome companions in our fast-paced world.  They can manifest as physical tension, racing thoughts, and a constant feeling of being on edge.  While some stress is normal, chronic stress and anxiety can significantly impact our physical and mental well-being.  The good news? There are a multitude of effective techniques to relieve stress and anxiety, empowering you to take control and reclaim your inner calm.</p>\r\n    <br>\r\n    </div>\r\n            \r\n<br>\r\n      \r\n\r\n        <div class=\"container2\">\r\n          <h3 class=\"article-title\" style=\"font-size:18px;\">Lifestyle Modifications for Stress Reduction:</h3>\r\n        <br>\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Prioritize Sleep Hygiene:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Prioritize Sleep: </b><br>Chronic sleep deprivation exacerbates stress and anxiety. Aim for 7-8 hours of quality sleep each night. Develop a consistent sleep schedule and practice good sleep hygiene.</li>\r\n            <br>\r\n            <li><b>Embrace Exercise: </b><br>Physical activity is a powerful stress reliever. Engage in regular exercise, even if it\'s just a brisk walk for 30 minutes most days of the week. Exercise releases endorphins, natural mood elevators that combat stress hormones.</li>\r\n            <br> \r\n            <li><b>Nourish Your Body: </b><br>What you eat impacts your mood and stress levels. Choose a balanced diet rich in fruits, vegetables, whole grains, and lean protein. Limit processed foods, sugar, and unhealthy fats, which can contribute to anxiety.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Mind-Body Techniques for Calming the Storm:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Mindfulness Meditation: </b><br>Mindfulness practices train your attention to focus on the present moment without judgment. Meditation can help quiet a racing mind, reduce stress hormones, and promote feelings of calmness.</li>\r\n            <br>\r\n            <li><b>Deep Breathing Exercises: </b><br>Simple yet effective, deep breathing techniques can significantly reduce anxiety. Focus on slow, deep breaths from your diaphragm, inhaling for a count of four and exhaling for a count of six. Repeat for several minutes to activate the body\'s relaxation response.</li>\r\n            <br> \r\n            <li><b>Progressive Muscle Relaxation: </b><br>This technique involves tensing and relaxing different muscle groups throughout your body. By focusing on the physical sensations of tension and release, you can promote relaxation and reduce stress.</li>\r\n            <br> \r\n            <li><b>Yoga and Tai Chi: </b><br>Combining physical postures with controlled breathing and meditation, yoga and Tai Chi offer a holistic approach to stress management. These practices promote relaxation, improve flexibility, and enhance mindfulness.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          \r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Building Resilience Through Healthy Habits:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Schedule Time for Relaxation: </b><br>Don\'t let your life become a constant to-do list. Schedule time for activities you enjoy, whether it\'s reading, spending time in nature, or listening to calming music. Engaging in hobbies promotes relaxation and helps manage stress.</li>\r\n            <br>\r\n            <li><b>Connect with Loved Ones: </b><br>Social support is crucial for managing stress and anxiety. Spend time with friends and family who make you feel supported and loved.</li>\r\n            <br> \r\n            <li><b>Seek Professional Help: </b><br>If stress and anxiety become overwhelming and interfere with your daily life, don\'t hesitate to seek professional help. A therapist can provide valuable tools and strategies for managing stress and anxiety disorders.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:17px;\">Revive:  Your Partner in Stress Management</h3>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">\r\n          Revive understands the challenges of stress and anxiety. Our app offers features to support your journey towards a calmer and more peaceful you:</p>\r\n            \r\n            <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Guided Meditations: </b>Learn relaxation techniques like mindfulness meditation and deep breathing exercises to manage stress and promote calmness.</li>\r\n            <li><b>Relaxation Soundscapes: </b>Soothing sounds like nature sounds or calming music can create a relaxing environment and aid in stress reduction.</li>\r\n            <li><b>Guided Meditations: </b>Learn relaxation techniques to quiet your mind and prepare your body for sleep.</li>\r\n            <li><b>Community Support: </b>Connect with others who are on their sleep journey and share experiences and tips.</li>\r\n          </ol>\r\n            <br>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">\r\n          Remember, you\'re not alone in the fight against stress and anxiety. By incorporating these techniques, prioritizing self-care, and leveraging the tools offered by Revive, you can effectively manage stress, cultivate inner peace, and reclaim your emotional well-being.</p>\r\n    </div>\r\n    <br><br>', '2024-05-10'),
(12, 'phone-in-bed.jpg', 'SLEEP AND THE MODERN WORLD:', 'Addressing Challenges in the Digital Age', 'Sleep', ' <div class=\"container2\" >  \r\n          <p class=\"article-text\" style=\"font-size:12px;\">The digital revolution has undeniably transformed our lives. However, this constant connectivity comes at a cost – disrupted sleep patterns. In this fast-paced world, prioritizing sleep often falls by the wayside, leading to a multitude of challenges. Let\'s delve into the sleep struggles plaguing the modern world and explore strategies to reclaim restful nights in the digital age.</p>\r\n    <br>\r\n    </div>\r\n            \r\n<br>\r\n      \r\n\r\n        <div class=\"container2\">\r\n         \r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">The Culprits of Modern-Day Sleep Disruption:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>The Blue Light Blight: </b><br>Chronic sleep deprivation exacerbates stress and anxiety. Aim for 7-8 hours of quality sleep each night. Develop a consistent sleep schedule and practice good sleep hygiene.</li>\r\n            <br>\r\n            <li><b>The FOMO Factor:  </b><br>The fear of missing out (FOMO) keeps us glued to our devices, constantly checking social media and emails. This constant stimulation keeps our minds racing, making it difficult to wind down and prepare for sleep.</li>\r\n            <br> \r\n            <li><b>The Binge-Watching Trap: </b><br>Streaming services offer endless entertainment options, tempting us to stay up late watching just \"one more episode.\"  These late-night sessions significantly cut into sleep time and disrupt sleep cycles.</li>\r\n          </ol><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">The Consequences of Sleep Deprivation in the Digital Age:</h3>\r\n          <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Cognitive Decline:  </b><br>Chronic sleep deprivation impairs focus, concentration, and memory.  This can translate to decreased productivity at work, difficulty learning new things, and increased forgetfulness.</li>\r\n            <br>\r\n            <li><b>Emotional Imbalance:  </b><br>Sleep deprivation disrupts the delicate balance of neurotransmitters in the brain, impacting mood.  Increased irritability, anxiety, and difficulty managing stress become common, impacting personal and professional relationships.</li>\r\n            <br> \r\n            <li><b>Weakened Immunity:  </b><br>Sleep is crucial for a healthy immune system. Sleep deprivation reduces the production of infection-fighting cells and antibodies, making us more susceptible to illnesses.</li>\r\n            <br> \r\n            <li><b>Chronic Health Risks: </b><br>Studies link chronic sleep deprivation to an increased risk of developing chronic conditions like heart disease, diabetes, and obesity.</li>\r\n          </ol><br><br>\r\n\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Combating Sleep Disruption in the Digital World:</h3>\r\n            \r\n            <ol class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Establish Boundaries:</b>Set clear boundaries around screen time before bed. Power down devices at least an hour before bedtime to allow your body and mind to wind down.</li>\r\n            <li><b>Create a Sleep Sanctuary:  </b>Optimize your bedroom for sleep.  Ensure it\'s dark, quiet, cool, and free from clutter. Invest in blackout curtains, earplugs, and a comfortable mattress and pillows.</li>\r\n            <li><b>Digital Detox: </b>Schedule regular digital detox periods.  Disconnect from electronic devices for a set amount of time each day or designate specific times when you check emails or social media.</li>\r\n            <li><b>Mindfulness Apps: </b>Utilize technology for good!  There are many apps available that offer guided meditations, sleep soundscapes, and educational resources on sleep hygiene. Revive can be your partner in this journey towards better sleep!</li>\r\n          </ol>\r\n            <br>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">\r\n          Technology doesn\'t have to be the enemy of sleep. With awareness of the challenges and by implementing practical strategies, you can create a healthy balance between technology and sleep.  Prioritize rest, create a sleep-supportive environment, and embrace digital detox practices. By making sleep a non-negotiable part of your routine, you can wake up feeling refreshed, energized, and ready to conquer the digital world with a clear mind and a healthy body.</p>\r\n    </div>\r\n    <br><br>', '2024-04-25'),
(13, 'happy-life.jpg', 'THE INTERTWINED TRIO:', 'Mental Health, Relationships, and a Happy Life.', 'Mental Health', '<div class=\"container2\" >  \r\n          <p class=\"article-text\" style=\"font-size:12px;\">Mental health, relationships, and happiness are intricately connected, forming the foundation for a fulfilling life. Let\'s explore how each element influences the others and how nurturing them all contributes to overall well-being.</p>\r\n    <br>\r\n    </div>\r\n            \r\n<br>\r\n      \r\n\r\n        <div class=\"container2\">\r\n         \r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Mental Health: The Foundation of Wellbeing</h3>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">Mental health refers to our emotional, psychological, and social well-being. It impacts how we think, feel, and act. Just like physical health, good mental health is essential for living a full and productive life. When our mental health is strong, we can:</p>\r\n\r\n          <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Manage stress effectively.</b></li>\r\n            <li><b>Maintain healthy relationships.</b></li>\r\n            <li><b>Cope with challenges.rap: </b></li>\r\n            <li><b>Set and achieve goals.</b></li>\r\n            <li><b>Enjoy life\'s activities.</b></li>\r\n          </ul><br><br>\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Relationships: The Source of Connection and Support</h3>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">Humans are social creatures who thrive on connection. Healthy relationships provide a sense of belonging, love, and support. Strong relationships can:</p>\r\n\r\n            <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Boost self-esteem and confidence.</b></li>\r\n            <li><b>Provide a safe space to express emotions.</b></li>\r\n            <li><b>Offer encouragement and motivation.</b></li>\r\n            <li><b>Reduce stress and loneliness.</b></li>\r\n            <li><b>Increase feelings of happiness and well-being.</b></li>\r\n            </ul><br><br>\r\n\r\n\r\n            <h3 class=\"article-title\" style=\"font-size:15px;\">Happiness: The Fruit of a Healthy Ecosystem</h3>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">Happiness isn\'t a constant state, but rather a sense of contentment and peace. It\'s the feeling of satisfaction with your life and a sense of purpose.  When mental health and relationships are nurtured, happiness blossoms:</p>\r\n\r\n            <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>A healthy mind fosters positive emotions like joy, gratitude, and love.</b></li>\r\n            <li><b>Strong relationships provide a foundation for happiness by offering support and shared experiences.</b></li>\r\n            <li><b>Happiness motivates us to take care of ourselves and our relationships, further strengthening the cycle.</b></li>\r\n            </ul><br><br>\r\n\r\n\r\n\r\n          <h3 class=\"article-title\" style=\"font-size:15px;\">Nurturing the Trio for a Fulfilling Life</h3>\r\n            \r\n            <ul class=\"article-text\" style=\"font-size:12px;\">\r\n            <li><b>Prioritize Mental Health: </b>Practice self-care activities like mindfulness meditation, exercise, and getting enough sleep. Seek professional help if you struggle with mental health challenges.</li>\r\n            <br>\r\n            <li><b>Invest in Relationships: </b>Cultivate strong relationships with loved ones. Spend quality time, practice active listening, and offer support. Build a strong social network by joining clubs or volunteering.</li>\r\n            <br>\r\n            <li><b>Practice Gratitude: </b>Regularly reflect on the positive aspects of your life, both big and small. Gratitude fosters happiness and strengthens relationships.</li>\r\n            <br>\r\n            <li><b>Set Goals and Pursue Passions: </b>Setting achievable goals and pursuing activities you enjoy gives your life purpose and direction.</li>\r\n            <br>\r\n            <li><b>Help Others: </b>Helping others is a proven way to boost happiness and connect with your community.</li>\r\n          </ul>\r\n            <br>\r\n          <p class=\"article-text\" style=\"font-size:12px;\">\r\n          By taking care of your mental health, nurturing your relationships, and fostering gratitude, you can create a fulfilling and happy life. Remember, Revive can be a resource on your journey, offering tools for relaxation, stress management, and information on mental health.  You are not alone!</p>\r\n    </div>\r\n    <br><br>', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Sleep Stories'),
(2, 'Meditation'),
(3, 'Music Sounds');

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `diary_id` int(11) NOT NULL,
  `diary_date` datetime NOT NULL DEFAULT current_timestamp(),
  `diary_notes` longtext DEFAULT NULL,
  `sleep_start` time DEFAULT NULL,
  `sleep_end` time DEFAULT NULL,
  `diary_userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`diary_id`, `diary_date`, `diary_notes`, `sleep_start`, `sleep_end`, `diary_userid`) VALUES
(1, '2024-05-21 07:09:55', 'Still awake... Couldn\'t sleep. I hope I\'ll make up for it during the day:(', '20:00:00', '23:30:00', 5),
(2, '2024-05-21 08:32:49', 'Ughhhhhh', '08:32:00', '12:36:00', 1),
(3, '2024-05-21 11:27:41', 'Hi I\'m wealth.', '07:27:00', '13:27:00', 6),
(6, '2024-05-21 11:43:24', 'Hello Wealth is tired', '11:42:00', '17:42:00', NULL),
(7, '2024-05-21 11:48:45', 'Men mount', '11:46:00', '14:46:00', 6),
(8, '2024-05-21 11:51:22', 'Class is smething else today ', '11:51:00', '17:51:00', 5),
(9, '2024-05-21 11:52:54', 'My sister is really trying in MOAT.. I\'m up praying for her.', '11:52:00', '20:58:00', 4),
(10, '2024-05-21 11:54:33', 'Do you know what I really need right now?...   A one week trip to any other continent but Africa.', '11:53:00', '17:53:00', 4),
(11, '2024-05-21 16:01:53', 'Doing presentation atm, and I wish I could just leave and go to my bed.', '16:01:00', '19:01:00', 4),
(12, '2024-05-27 09:37:12', 'Had to wake up to prepare food my husband would take to work.', '23:00:00', '05:30:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `seen` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `message`, `seen`) VALUES
(1, 'Hello There!.. Congrats on joing Revive! :)', 1),
(2, 'New <a href=\"musictab.php\" style=\"color:rgb(75, 131, 176);\">Music</a> for you to listen to!', 1),
(8, 'How are you feeling today?.. <a href=\"profiletab.php\" style=\"color:rgb(75, 131, 176)\">Journal</a> it down!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `playlist_id` int(11) NOT NULL,
  `playlist_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`playlist_id`, `playlist_name`) VALUES
(1, 'Sleep Sounds'),
(2, 'Sleep Sounds'),
(3, 'Sleep Sounds'),
(4, 'Sleep Sounds'),
(5, 'Sleep Sounds'),
(6, 'Sleep Sounds'),
(7, 'Sleep Sounds'),
(8, 'Sleep Sounds'),
(9, 'Infinite Piano Acoustics'),
(11, 'Infinite Piano Acoustics'),
(12, 'Infinite Piano Acoustics'),
(13, 'Infinite Piano Acoustics'),
(14, 'Infinite Piano Acoustics'),
(15, 'Infinite Piano Acoustics'),
(16, 'Infinite Piano Acoustics'),
(17, 'Infinite Piano Acoustics'),
(18, 'Infinite Piano Acoustics'),
(19, 'Infinite Piano Acoustics'),
(20, 'Infinite Piano Acoustics'),
(21, 'Infinite Piano Acoustics'),
(22, 'Infinite Piano Acoustics'),
(23, 'Infinite Piano Acoustics'),
(24, 'Infinite Piano Acoustics'),
(25, 'Infinite Piano Acoustics'),
(26, 'Infinite Piano Acoustics'),
(27, 'Soothing Nature Sounds'),
(28, 'Soothing Nature Sounds'),
(29, 'Soothing Nature Sounds'),
(30, 'Soothing Nature Sounds'),
(31, 'Soothing Nature Sounds'),
(32, 'Soothing Nature Sounds'),
(33, 'Soothing Nature Sounds'),
(34, 'Soothing Nature Sounds'),
(35, 'Soothing Nature Sounds'),
(36, 'Soothing Nature Sounds'),
(37, 'Soothing Nature Sounds'),
(38, 'Soothing Nature Sounds'),
(39, 'Soothing Nature Sounds'),
(40, 'Soothing Nature Sounds'),
(41, 'Soothing Nature Sounds'),
(42, 'Peaceful Meditation'),
(43, 'Peaceful Meditation'),
(44, 'Peaceful Meditation'),
(45, 'Peaceful Meditation'),
(46, 'Peaceful Meditation'),
(47, 'Peaceful Meditation'),
(48, 'Peaceful Meditation'),
(49, 'Peaceful Meditation'),
(50, 'Peaceful Meditation'),
(51, 'Peaceful Meditation'),
(52, 'Peaceful Meditation'),
(53, 'Wind Down(Jazz)'),
(54, 'Wind Down(Jazz)'),
(55, 'Wind Down(Jazz)'),
(56, 'Wind Down(Jazz)'),
(57, 'Wind Down(Jazz)'),
(58, 'Wind Down(Jazz)'),
(59, 'Wind Down(Jazz)'),
(60, 'Wind Down(Jazz)'),
(61, 'Wind Down(Jazz)'),
(62, 'Wind Down(Jazz)'),
(63, 'Wind Down(Jazz)'),
(64, 'Narrated By'),
(65, 'Narrated By'),
(66, 'Soothing Nature Sounds'),
(67, 'Narrated By'),
(68, 'Narrated By'),
(69, 'Narrated By'),
(70, 'Zen Garden'),
(71, 'Zen Garden'),
(72, 'Zen Garden'),
(73, 'Zen Garden'),
(74, 'Zen Garden'),
(75, 'Zen Garden'),
(76, 'Zen Garden'),
(77, 'Zen Garden'),
(78, 'Zen Garden'),
(79, 'Zen Garden'),
(80, 'Zen Garden'),
(81, 'Zen Garden'),
(82, 'Zen Garden'),
(83, 'Guided Meditation'),
(84, 'Guided Meditation'),
(85, 'Guided Meditation'),
(86, 'Guided Meditation'),
(87, 'Guided Meditation'),
(88, 'Guided Meditation'),
(89, 'Guided Meditation'),
(90, 'Guided Meditation'),
(92, 'Guided Meditation'),
(93, 'Guided Meditation'),
(94, 'Guided Meditation'),
(95, 'Cozy Sleep Stories'),
(96, 'Cozy Sleep Stories'),
(97, 'Cozy Sleep Stories'),
(98, 'Cozy Sleep Stories'),
(99, 'Cozy Sleep Stories'),
(100, 'Cozy Sleep Stories'),
(101, 'Cozy Sleep Stories'),
(102, 'Cozy Sleep Stories');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `quote_id` int(11) NOT NULL,
  `quote_author` varchar(200) DEFAULT NULL,
  `quote_message` longtext DEFAULT NULL,
  `quote_image` varchar(300) DEFAULT NULL,
  `quote_qcatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`quote_id`, `quote_author`, `quote_message`, `quote_image`, `quote_qcatid`) VALUES
(1, 'Buddha', '\"Each morning we are born again. What we do today is what matters most.\"', 'bb3.jpg', 1),
(2, 'Benjamin Franklin', '\"Early to bed and early to rise makes a man healthy, wealthy, and wise.\"', 'bb3.jpg', 1),
(3, 'Revive', '\"Every morning is a new opportunity to begin again.\"', 'bb3.jpg', 1),
(7, 'Revive', '\"Rise up, start fresh, see the bright opportunity in each day.\"', 'bb3.jpg', 1),
(8, 'Dwight Howard', '\"Today is a new day. Even if you were wrong yesterday, you can get it right today.\"', 'bb3.jpg', 1),
(9, 'Eleanor Roosevelt', '\"With the new day comes new strngth and new thoughts.\"', 'bb3.jpg', 1),
(10, 'Richelle .E. Goodrich', '\"Every sunrise is an invitation for us to arise and brighten someone\'s day.\"', 'bb3.jpg', 1),
(11, 'Revive', '\"Night is the wonderful opportunity to take rest, to forgive, to smile, to get ready for all the battles that you have to fight tomorrow.\"', 'bb4.JPG', 2),
(12, 'Jonathan Lockwood Huie', '\"The darkest night is often the bridge to the brightest tomorrow.\"', 'bb4.JPG', 2),
(13, 'Revive', '\"End each day with gratitude for the moments you experienced and the lessons you learned.\"', 'pexels-gnist-706498.jpg', 2),
(14, 'Revive', '\"Sleep is an investment in tomorrow.\"', 'pexels-gnist-706498.jpg', 2),
(15, 'Revive', '\"Dream big, work hard, and get plenty of sleep.\"', 'pexels-gnist-706498.jpg', 2),
(16, 'Revive', '\"Sleep is the foundation of a healthy mind and body. Cherish it.\"', 'pexels-gnist-706498.jpg', 2),
(17, 'Tom Rath', '\"Sleep is the investment in the energy you need to be effective tomorrow.\"', 'bb4.JPG', 2),
(18, 'Napoleon Bonaparte', '\"Let her sleep, for when she wakes, she will move mountains.\"', 'bb4.JPG', 2),
(19, 'Leonardo da Vinci', '\"A well-spent day, brings happy sleep.\"', 'bb4.JPG', 2),
(20, 'Marilyn Monroe', '\"The nicest thing for me is sleep, then at least I can dream.\"', 'bb4.JPG', 2),
(21, 'Miguel de Cervantes', '\"Sleep is the best cure for waking troubles.\"', 'bb4.JPG', 2),
(22, 'Dalai Lama', '\"Sleep is the best meditation.\"', 'bb4.JPG', 2),
(23, 'Joan Klempne', '\"To achieve the impossible dream, try going to sleep.\"', 'bb4.JPG', 2),
(24, 'Thomas Dekker', '\"Sleep is the golden chain that ties our health and bodies together.\"', 'bb4.JPG', 2),
(25, 'Anthony .T. Hincks', '\"Goodnight. Sleep awaits those of us who dare to dream.\"', 'bb4.JPG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quote_category`
--

CREATE TABLE `quote_category` (
  `qcat_id` int(11) NOT NULL,
  `qcat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote_category`
--

INSERT INTO `quote_category` (`qcat_id`, `qcat_name`) VALUES
(1, 'Morning'),
(2, 'Night');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `client_name` varchar(300) DEFAULT NULL,
  `review_rating` enum('1star','2stars','3stars','4stars','5stars') NOT NULL,
  `review_message` mediumtext DEFAULT NULL,
  `review_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `client_name`, `review_rating`, `review_message`, `review_date`) VALUES
(1, 'Ethan Brown', '5stars', 'I love how customizable Revive is. I can tailor my sleep experience to suit my preferences perfectly, whether it\'s adjusting the sound volume or choosing my favorite sleep sounds. Absolutely fantastic!', '2024-05-29 21:51:34'),
(2, 'Michael Durotoye', '5stars', 'I\'ve tried countless sleep apps, but Revive is by far the best. It\'s intuitive, easy to use, and has improved my sleep immensely. 5 stars!', '2024-05-29 21:54:29'),
(3, 'Emily Johnson', '5stars', 'Finally, a sleep app that actually works! Revive helps me fall asleep faster and stay asleep throughout the night. Highly recommended!', '2024-05-29 21:54:29'),
(4, 'Natalie Oge', '5stars', 'Revive\'s sleep analysis feature has helped me identify and address potential sleep disturbances, leading to more restful nights and increased productivity during the day. I can\'t thank this app enough!', '2024-05-29 21:54:29'),
(5, 'Sarah Thompson', '5stars', 'Revive has become an essential part of my nightly routine. The calming sounds and guided meditations help me unwind and drift off to sleep effortlessly. Couldn\'t be happier!', '2024-05-29 21:54:29'),
(6, 'Benjamin White', '5stars', 'I\'ve struggled with stress and anxiety for years, but Revive has provided me with a sense of calm and relaxation like never before. The sleep meditations are a lifesaver!', '2024-05-29 21:54:29'),
(7, 'John Owolabi', '5stars', 'Revive has transformed my sleep quality! I wake up feeling refreshed and energized every morning. 5 stars!', '2024-05-29 21:54:29'),
(8, 'Oliver Taylor', '5stars', 'I\'ve never been one to write reviews, but Revive has had such a profound impact on my life that I felt compelled to share my experience. If you\'re struggling with sleep issues, do yourself a favor and give this app a try. You won\'t regret it!', '2024-05-29 21:54:29'),
(9, 'Lily Asinobi', '5stars', 'Revive has become my secret weapon for conquering jet lag. Whether I\'m traveling for work or leisure, this app helps me adjust to new time zones seamlessly. Highly recommend to frequent travelers!', '2024-05-29 21:54:29'),
(10, 'Oscar Innocent', '5stars', 'As someone who struggles with insomnia, Revive has been a game-changer for me. The sleep tracking feature helps me understand my sleep patterns better, and the personalized recommendations have made a significant difference in my sleep quality. Thank you, Revive!', '2024-05-29 21:54:29'),
(11, 'Wealth Momodu', '5stars', 'Amazing app!.. Can\'t wait to recommend it to my colleagues at work :).', '2024-05-29 21:56:56'),
(12, 'Anonymous', '3stars', 'Haven\'t used it yet, but I\'ll give a better review in a few weeks.', '2024-05-29 22:17:23'),
(13, '\"Finally, restful nights!\"', '5stars', 'I\'ve battled anxiety-induced insomnia for years, but Revive has been a lifesaver. The sleep stories and mindfulness exercises help quiet my racing mind, allowing me to drift off peacefully. I wake up feeling refreshed and ready to tackle the day. Thank you, Revive!', '2024-05-29 23:04:26'),
(14, '\"Calming and comforting\"', '5stars', 'Revive is like a warm hug for my soul. Since using Revive, I\'ve noticed a significant decrease in my anxiety levels and an overall improvement in my mental well-being. It\'s become an essential part of my nightly routine.', '2024-05-29 23:04:26'),
(15, '\"Stress relief on-the-go.\"', '5stars', 'As someone with a busy lifestyle, I appreciate how Revive provides stress relief on-the-go. Whether I\'m traveling or at home, I can rely on the app to help me relax and achieve a sense of calmness.', '2024-05-29 23:04:26'),
(16, '\"Mindfulness made easy\"', '5stars', 'Revive has made mindfulness and stress reduction easy and accessible for me. With its user-friendly interface and variety of relaxation techniques, I\'m able to incorporate mindfulness practices into my daily routine with ease, resulting in improved sleep quality and overall well-being.', '2024-05-29 23:04:26'),
(17, '\"A sanctuary for sleep\"', '5stars', 'Revive has transformed my sleep sanctuary into a tranquil oasis. The app\'s selection of ambient sounds and white noise options create the perfect backdrop for relaxation. I love falling asleep to the gentle hum of nature or the rhythmic sound of ocean waves.', '2024-05-29 23:04:26'),
(18, '\"Life-Changing!\"', '5stars', 'As someone who struggles with chronic stress and anxiety, this app offers a comprehensive approach, combining soothing sounds, guided meditations, and relaxation techniques. I\'ve noticed a significant reduction in my stress levels and a remarkable improvement in my sleep quality. Highly recommend!', '2024-05-29 23:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross-River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Foreign'),
(17, 'Gombe'),
(18, 'Imo'),
(19, 'Jigawa'),
(20, 'Kaduna'),
(21, 'Kano'),
(22, 'Katsina'),
(23, 'Kebbi'),
(24, 'Kogi'),
(25, 'Kwara'),
(26, 'Lagos'),
(27, 'Nassarawa'),
(28, 'Niger'),
(29, 'Ogun'),
(30, 'Ondo'),
(31, 'Osun'),
(32, 'Oyo'),
(33, 'Plateau'),
(34, 'Rivers'),
(35, 'Sokoto'),
(36, 'Taraba'),
(37, 'Yobe'),
(38, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `track_id` int(11) NOT NULL,
  `track_playlstid` int(11) NOT NULL,
  `track_name` varchar(200) DEFAULT NULL,
  `track_artist` varchar(200) DEFAULT NULL,
  `track_image` varchar(300) DEFAULT NULL,
  `track_audio` varchar(300) DEFAULT NULL,
  `track_duration` varchar(100) NOT NULL,
  `track_catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`track_id`, `track_playlstid`, `track_name`, `track_artist`, `track_image`, `track_audio`, `track_duration`, `track_catid`) VALUES
(1, 1, 'Lallucid', 'AQUINE', 'Lallucid.jpg', 'Lallucid.mp3', '03:08', 3),
(2, 2, 'Healing Stars', 'Soothe My Soul', 'healing stars-SMS.JPG', 'Healing Stars.mp3', '04:19', 3),
(3, 3, 'The Awakening', 'Andrea Accorsi', 'awakening.jpg', 'The Awakening.mp3', '02:00', 3),
(4, 4, 'Starfall', 'OLEMA', 'starfall.JPG', 'STARFALL (SLEEP).mp3', '03:10', 3),
(5, 5, 'Serendipity', 'Mobee', 'serendipity.jpg', 'Serendipity.mp3', '03:18', 3),
(6, 6, 'Shine', 'Dozy', 'shine.JPG', 'Shine.mp3', '03:01', 3),
(7, 7, 'Reflections of a Dream', 'LUVT', 'reflections-of-a-dream.jpg', 'Reflections of a Dream.mp3', '03:38', 3),
(8, 8, 'Xavaros', 'ALLUMARE', 'xavaros.JPG', 'Xavaros.mp3', '03:45', 3),
(9, 9, 'River Flows in You', 'Revive', 'river-flows-in-you.jpg', 'River Flows In You.mp3', '02:08', 3),
(11, 11, 'Starlight Nights', 'Piano Passion', 'starlight-nights.jpg', 'Starlight Nights.mp3', '01:59', 3),
(12, 12, 'Ne M’oublie pas', 'Noel', 'pexels-anton-kudryashov-118639843-10400746.jpg', 'Je te laisserai de mots.mp3', '02:05', 3),
(13, 13, 'Idea-01', 'Gilbran Alcocer', 'idea-1.jpg', 'Idea 1.mp3', '02:34', 3),
(14, 14, 'Idea-22', 'Gilbran Alcocer', 'idea-22.jpg', 'Idea 22.mp3', '02:32', 3),
(15, 15, 'Interstellar', 'R.P, Revive', 'interstellar.jpg', 'Interstellar (Main Theme).mp3', '04:32', 3),
(16, 16, 'Counting Stars', 'A.W, Revive', 'counting-stars.jpg', 'Counting Stars.mp3', '02:18', 0),
(17, 17, 'Ocean Eyes', 'Ludvig Hall', 'ocean-eyes.jpg', 'Ocean Eyes.mp3', '02:01', 3),
(18, 18, 'The Scientist', 'B.C, Revive', 'the-scientist.jpg', 'The Scientist.mp3', '02:03', 3),
(19, 19, 'Shallow', 'Ludvig Hall', 'shallow.jpg', 'Shallow.mp3', '02:03', 3),
(20, 20, 'Gymnopedie', 'Magnus .E.', 'gymnopedie.jpg', 'Gymnopedie.mp3', '02:05', 3),
(21, 21, 'Stay', 'Emmanuel .P.', 'stay.jpg', 'Stay.mp3', '02:06', 3),
(22, 22, 'Riptide', 'Michael .R.', 'riptide.jpg', 'Riptide.mp3', '01:32', 3),
(23, 23, 'Another Sleep', 'Alexandre .P.', 'another-love.jpg', 'Another Love (Piano Arrangement).mp3', '04:00', 3),
(24, 24, 'Slumber', 'Max .H.', 'sonder.jpg', 'Sonder.mp3', '01:39', 3),
(25, 25, 'El Sueño es Vida', 'B.M, Revive', 'viva-la-vida.jpg', 'Viva La Vida.mp3', '05:00', 3),
(26, 26, 'Looks Like Sleep', 'Original Three', 'look-like-sleep.JPG', 'You Gave Me That Look.mp3', '05:04', 3),
(27, 27, 'Undae', 'Domy Castellano', 'undae.jpg', 'Undae.mp3', '02:36', 3),
(28, 28, 'Evening Mist', 'Retland', 'evening-mist.jpg', 'Evening Mist.mp3', '02:48', 3),
(29, 29, 'Calm Stream', 'Morouj', 'calm-stream.jpg', 'Calm Stream.mp3', '02:24', 3),
(30, 30, 'Singing Birds ', 'El Naturel', 'singing-birds.jpg', 'Singing Birds by the Stream.mp3', '02:55', 3),
(31, 31, 'Forest Therapy', 'INDAYA', 'forest-therapy.jpg', 'Forest Therapy.mp3', '03:16', 3),
(32, 32, 'Tranquility Flow', 'Niclas Lundqvist', 'tranquility-flow.jpg', 'Tranquility Flow.mp3', '02:27', 3),
(33, 33, 'Ethereal Rain', 'Aurora .A.', 'ethereal-rain.jpg', 'Ethereal Rain.mp3', '02:20', 3),
(34, 34, 'Flourish (Rain)', 'Celedon', 'flourish-rain.jpg', 'Flourish (Rain).mp3', '03:44', 3),
(35, 35, 'Order from Chaos', 'N.S.B', 'order-from-chaos.jpg', 'Order From Chaos - Nature.mp3', '03:20', 3),
(36, 36, 'Mindful Trickles', 'O.S, Revive', 'minful-trickles.jpg', 'Mindful Trickles.mp3', '02:32', 3),
(37, 37, 'Peaceful Ambience', 'Revive', 'peaceful-ambience.jpg', 'Peaceful Rain Ambience.mp3', '03:07', 3),
(38, 38, 'Crickets & Nature', 'White .R.', 'crickets.jpg', 'sounds-crickets-and-nature-in-summer-background-singing-142461.mp3', '02:10', 3),
(39, 39, 'Birds Singing-02', 'JuliusH', 'singing-birds-lake.jpg', 'birds-19624.mp3', '10:36', 3),
(40, 40, 'Ocean Waves', 'Revive', 'ocean-waves.jpg', 'relaxing-ocean-waves-high-quality-recorded-177004.mp3', '03:01', 3),
(41, 41, 'Rain and Thunder', 'Revive', 'rain and thunder.jpg', 'rain-and-thunder-16705.mp3', '12:06', 3),
(42, 42, 'Zenith', 'Centre of Attention', 'zenith.jpg', 'Zenith.mp3', '03:15', 2),
(43, 43, 'Elementals', 'H.P', 'elemental.jpg', 'Elemental.mp3', '02:24', 2),
(44, 44, 'Santanyi', 'Escix V', 'santanyi.jpg', 'Santanyi.mp3', '02:41', 2),
(45, 45, 'Oceanic Adagio', 'Remitere', 'oceanic-adegio.jpg', 'Oceanic Adagio.mp3', '03:23', 2),
(46, 46, 'Relaxing Sines', 'U&H', 'relaxing-sines.jpg', 'Relaxing Sines.mp3', '02:12', 2),
(47, 47, 'Little Cabin', 'Flyndon', 'the-little-cabin.jpg', 'The Little Cabin.mp3', '02:55', 2),
(48, 48, 'Luminary Creek', 'Zephyrical', 'luminary-creek.jpg', 'Luminary Creek.mp3', '02:25', 2),
(49, 49, 'Take a Breath', 'Moon Garden', 'take-a-breath.jpg', 'Take a Breath.mp3', '02:50', 2),
(50, 50, '417Hz Calma', 'S.G, Revive', '417-calma.jpg', '417 Hz Calma.mp3', '02:46', 2),
(51, 51, 'Rain Forest', 'PinetreeWay', 'rain-forest-meditation.jpg', 'Rain Forest Meditation.mp3', '03:51', 2),
(52, 52, 'Serale', 'Domy Castellano', 'serale.jpg', 'Serale.mp3', '02:52', 2),
(53, 53, 'Misty Morning', 'M.C, Revive', 'misty-morning.jpg', 'Misty Morning.mp3', '03:16', 3),
(54, 54, 'Honeymoon', 'B.D.B', 'honeymoon.jpg', 'Honeymoon.mp3', '04:20', 3),
(55, 55, 'T.G.I.F', 'Mike Ceon', 'thank-god-its-friday.jpg', 'Thank God It\'s Friday.mp3', '03:53', 3),
(56, 56, 'Wilting', 'Glass Trio', 'wilting.jpg', 'Wilting.mp3', '04:31', 3),
(57, 57, 'After Work', 'M.C. Quintet', 'after-work.jpg', 'After Rain.mp3', '03:40', 3),
(58, 58, 'In the Distance', 'Niclas Lundqvist', 'in-the-distance.jpg', 'In the Distance.mp3', '02:28', 3),
(59, 59, 'Buzios', 'Niclas Lundqvist', 'buzios.jpg', 'Buzios.mp3', '03:28', 3),
(60, 60, 'Here With You', 'Jazz Trio', 'im-here-with-you.jpg', 'I\'m Here with You (Rain).mp3', '03:36', 3),
(61, 61, 'Mist', 'Archie Taylor', 'mist.jpg', 'Mist.mp3', '04:15', 3),
(62, 62, 'Desire', 'Gillian .S.T', 'desire.jpg', 'Desire.mp3', '04:00', 3),
(63, 63, 'We\'ll Meet Again', 'Knipers & Winter', 'maybe-well-meet-again.jpg', 'Maybe We\'ll Meet Again.mp3', '03:37', 3),
(64, 64, 'In the Morning', 'Revive', 'cillian-murphy.JPG', 'In the Morning.mp3', '07:05', 1),
(65, 65, 'Sacred New Zealand', 'Revive', 'jerome-flynn.JPG', '\'Sacred New Zealand\'.mp3', '26:56', 1),
(66, 66, 'Calming Blizzard', 'Revive', 'snowy-blizzard.JPG', 'Calming Blizzard Sounds for Deep Sleep  Snow Storm Sleep Sounds 10MIN [ ezmp3.cc ].mp3', '13:52', 3),
(67, 67, 'Dream with Me', 'Revive', 'harry-styles.JPG', 'dream with me [ ezmp3.cc ].mp3', '38:58', 1),
(69, 69, 'A Paris Love Story', 'Revive', 'michelle.JPG', 'A Paris Love Story_ Romantic Bedtime Story - Michelles Sanctuary.mp3', '01:00:08', 1),
(70, 70, '432Hz Resonant Creek', 'Jarra', 'r.jpg', '432hz Resonant Creek.mp3', '02:51', 2),
(71, 71, 'Alternating Current', 'Heriela', 'r.jpg', 'Alternating Current.mp3', '04:02', 2),
(72, 72, 'Bodhisattva', 'Dakpa Nepali', 'r.jpg', 'Bodhisattva (Sound Bath).mp3', '03:28', 2),
(73, 73, 'Crystal Healing', 'Free Floaticity', 'pexels-landon-6946663.jpg', 'Crystal Healing.mp3', '02:54', 2),
(74, 74, 'Heavenly Lakes', 'Namtso Healing', 'pexels-pixworthmedia-3151191.jpg', 'Heavenly Lakes.mp3', '03:03', 0),
(75, 75, 'Where Water Flows', 'Suraj Ives', 'pexels-pixworthmedia-3151191.jpg', 'Where Water Flows.mp3', '02:50', 2),
(76, 76, 'Zen Forest', 'Suraj Ives', 'r.jpg', 'Zen Forest (Binaural).mp3', '03:07', 2),
(77, 77, 'Stillness', 'Bowls of Serenity', 'pexels-herman-io-1933116-3584309.jpg', 'Stillness.mp3', '03:04', 2),
(78, 78, 'Next Moment-432Hz', 'Liam Armstrong', 'pexels-herman-io-1933116-3584309.jpg', 'Next Moment - 432 Hz.mp3', '03:21', 2),
(79, 79, 'Dawnings', 'Moshi .M.D.', 'pexels-landon-6946663.jpg', 'Dawnings.mp3', '03:20', 2),
(80, 80, 'Cosmic Coast', 'Delayed Dreams', 'pexels-herman-io-1933116-3584309.jpg', 'Cosmic Coast - Sound Bath.mp3', '03:11', 2),
(81, 81, 'Des Roches Ritual', 'Electric Rivers', 'pexels-landon-6946663.jpg', 'Des Roches Ritual.mp3', '03:33', 2),
(82, 82, 'Alma', 'Pedro .C.', 'pexels-pixworthmedia-3151191.jpg', 'Alma.mp3', '02:20', 2),
(83, 83, '5-Mins Morning Meditation', 'Serenity .S.', '0img.jpg', '5 Minute Morning Meditation.mp3', '04:58', 2),
(84, 84, 'Breathing into Body', 'Revive', '0img.jpg', 'Breathing into the Body Guided Sleep Meditation (with Music).mp3', '04:24', 2),
(85, 85, 'Gratitude', 'Dreemy', '0img.jpg', 'Gratitude (with Guided Meditation).mp3', '04:14', 2),
(86, 86, 'Grounded', 'Eva Duarte', '0img.jpg', 'Grounded - Guided Meditation.mp3', '06:04', 2),
(87, 87, 'Affirmations for Manifesting', 'Davina Ho', '0img.jpg', 'Guided Meditation_ Affirmations For Manifesting.mp3', '08:48', 2),
(88, 88, 'Focus on Breathing', 'Zen Visions', '0img.jpg', 'Guided Meditation_ Focus On Chakra & Breathing.mp3', '06:42', 2),
(89, 89, 'Positive Affirmations', 'Davina Ho', '0img.jpg', 'Guided Meditation_ Positive Affirmations For Mental Well-Being.mp3', '06:06', 2),
(90, 90, 'Intentions', 'Dreemy', '0img.jpg', 'Intentions (with Guided Meditation).mp3', '05:03', 2),
(92, 92, 'Morning Affirmations', 'Defigo', '0img.jpg', 'Morning Affirmations (Guided Meditation).mp3', '05:02', 2),
(93, 93, 'Balancing your Chakras', 'Meditune', '0img.jpg', 'Balancing Your Chakras.mp3', '04:28', 2),
(94, 94, 'Mind and Body', 'Mason Geer', '0img.jpg', 'Mind and Body.mp3', '04:39', 2),
(95, 95, 'The Cherry Blossom Train', 'Revive', 'cozy-sleep-stories2.JPG', 'Cozy Bedtime Story for Grown Ups _ The Cherry Blossom Train [ ezmp3.cc ] (1).mp3', '18:34', 1),
(96, 96, 'The Palmetto Hideaway', 'Revive', 'cozy-sleep-stories2.JPG', 'Calm Story for Sleep 🌴 THE PALMETTO HIDEAWAY ✨ 1 HR Cozy Bedtime Story fo Grown-Ups (female voice) [ ezmp3.cc ].mp3', '23:34', 1),
(97, 97, 'The Radiance of Rome', 'Revive', 'cozy-sleep-stories2.JPG', 'Cozy Sleepy Story 🌙 _ THE RADIANCE OF ROME _ Calm Bedtime Story for Grown-Ups 😴 [ ezmp3.cc ].mp3', '22:34', 1),
(98, 98, 'Dreams Beneath the Pines', 'Revive', 'cozy-sleep-stories2.JPG', 'Deep Sleep Story _ DREAMS BENEATH THE PINES _ Sleep Story for Grown-Ups (relaxing female voice) [ ezmp3.cc ].mp3', '21:36', 1),
(99, 99, 'The Moonlit Chateau', 'Revive', 'cozy-sleep-stories2.JPG', 'Fall Asleep and Unwind 💤 THE MOONLIT CHATEAU ✨ Cozy Bedtime Story for Grown-Ups (female voice) [ ezmp3.cc ].mp3', '23:35', 1),
(100, 100, 'Castle in the Sky', 'Revive', 'cozy-sleep-stories2.JPG', 'Fantasy Bedtime Story for Grown-Ups _ CASTLE IN THE SKY _ Fairy Tale ASMR Storytelling [ ezmp3.cc ].mp3', '23:36', 1),
(101, 101, 'The Arch of Sleep', 'Revive', 'cozy-sleep-stories2.JPG', 'Relaxing Bedtime Story for Grown-Ups ✨ THE ARCH OF SLEEP 🌙 Fall Asleep in the Desert [ ezmp3.cc ].mp3', '23:38', 1),
(102, 102, 'The Forest Cabin', 'Revive', 'cozy-sleep-stories2.JPG', 'THE FOREST CABIN _ Sleepy Story for Grown-Ups with Rain Sounds (relaxing female voice) [ ezmp3.cc ].mp3', '23:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `track_likes`
--

CREATE TABLE `track_likes` (
  `like_id` int(11) NOT NULL,
  `like_trackid` int(11) NOT NULL,
  `like_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `plan` enum('Monthly- $3.33','Annually-$39.99') NOT NULL,
  `trans_ref` varchar(60) DEFAULT NULL,
  `trans_amt` float DEFAULT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `trans_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `email`, `plan`, `trans_ref`, `trans_amt`, `trans_date`, `trans_by`) VALUES
(28, 'wealth@gmail.com', 'Annually-$39.99', '1717458293714656675', 39.99, '2024-06-03 23:44:53', 6),
(29, 'wealth@gmail.com', 'Monthly- $3.33', '17174586171143159565', 3.33, '2024-06-03 23:50:17', 6),
(30, 'wealth@gmail.com', 'Monthly- $3.33', '17175048191779529644', 3.33, '2024-06-04 12:40:19', 6);

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE `trans_details` (
  `det_id` int(11) NOT NULL,
  `det_transid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`det_id`, `det_transid`) VALUES
(20, 28),
(21, 29),
(22, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` enum('Male','Female') NOT NULL,
  `user_stateid` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_dob`, `user_gender`, `user_stateid`, `user_password`) VALUES
(1, 'Amanda', 'Nwachukwu', 'amyyrocks213@gmail.com', '1999-02-16', 'Female', 18, '123456'),
(2, 'Joe', 'Nwachukwu', 'joseph@gmail.com', '2003-02-19', 'Male', 26, '$2y$10$s/ZoHmE/SsbAwyRpCTfyhOSUxY1SY8Xeq7995MLLCrH5kF4p.6yHe'),
(3, 'Joseph', 'Nwachukwu', 'joseph@gmail.com', '2003-02-19', 'Male', 26, '$2y$10$xeh1lNPBMZ7sYsLMye/qbueHBcbvSma2uVU8dM8N9KKYnwKFA9X/W'),
(4, 'Esther', 'Nwachukwu', 'esther@gmail.com', '2001-04-15', 'Female', 18, '$2y$10$Sfjo4UQT1sDT5KVj1Hwh3Onurx2FwtUu6z915U/h2a6mn1gSFMzE6'),
(5, 'Oscar', 'Innocent', 'oscarinnocent3@gmail.com', '1995-05-31', 'Male', 16, '$2y$10$grSxOUVB8whTH89hBEToAuLPH7UfTtru8Gv3J2EjP/rsrv7AVOHFe'),
(6, 'Wealth', 'Momodu', 'wealth@gmail.com', '2024-01-01', 'Male', 12, '$2y$10$5C4X.hrQgj2dUCpQCykyvOjoh7QIiMfdBtlhNsTzEW/1v0WYOAPVi'),
(7, 'Dorin', 'Nwachukwu', 'onyinyechi1@gmail.com', '1976-09-05', 'Female', 18, '$2y$10$MXyafPJd1gZM3Eh0pQTRjeWM6ZTIV3VjcMwj7nmK.VHjjxLQmfhUG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assess_id`),
  ADD KEY `FKUS-ASS` (`user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`diary_id`),
  ADD KEY `diary_ibfk_1` (`diary_userid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`playlist_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `quote_category`
--
ALTER TABLE `quote_category`
  ADD PRIMARY KEY (`qcat_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `FKCAT` (`track_catid`),
  ADD KEY `playlist_id_fk` (`track_playlstid`);

--
-- Indexes for table `track_likes`
--
ALTER TABLE `track_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `like-track` (`like_trackid`),
  ADD KEY `like-user` (`like_userid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `trans-user` (`trans_by`);

--
-- Indexes for table `trans_details`
--
ALTER TABLE `trans_details`
  ADD PRIMARY KEY (`det_id`),
  ADD KEY `det_trans` (`det_transid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_stateid` (`user_stateid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `diary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `quote_category`
--
ALTER TABLE `quote_category`
  MODIFY `qcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `track_likes`
--
ALTER TABLE `track_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `trans_details`
--
ALTER TABLE `trans_details`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `FKUS-ASS` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `diary_ibfk_1` FOREIGN KEY (`diary_userid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `playlist_id_fk` FOREIGN KEY (`track_playlstid`) REFERENCES `playlists` (`playlist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `track_likes`
--
ALTER TABLE `track_likes`
  ADD CONSTRAINT `like-track` FOREIGN KEY (`like_trackid`) REFERENCES `tracks` (`track_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like-user` FOREIGN KEY (`like_userid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `trans-user` FOREIGN KEY (`trans_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_details`
--
ALTER TABLE `trans_details`
  ADD CONSTRAINT `det_trans` FOREIGN KEY (`det_transid`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_stateid`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
