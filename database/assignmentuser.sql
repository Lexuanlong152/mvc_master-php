-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2021 lúc 03:55 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignmentuser`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `upload_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `avatar`
--

INSERT INTO `avatar` (`id`, `userID`, `image`, `upload_at`) VALUES
(3, 126, '1638286344_testimonials-1.jpg', '2021-11-28 14:40:17'),
(10, 139, '1638285970_testimonials-1.jpg', '2021-11-30 15:22:17'),
(25, 154, '1638320855_testimonials-5.jpg', '2021-12-01 00:49:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `userID`, `comment`, `create_at`) VALUES
(107, 154, 'Khoa hoc tuyet voi', '2021-12-01 01:01:07'),
(108, 154, 'Chat luong bai giang tot', '2021-12-01 01:01:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `address`, `email`, `phonenumber`) VALUES
(1, '268 Lý Thường Kiệt, Phường 14, Đồng Nai', 'chinhchuoi7420@gmail.com', '0352323179');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `rating` float NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `num_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id`, `name`, `img`, `author`, `price`, `rating`, `category`, `content`, `num_users`) VALUES
(1, 'Mastering Data Structures & Algorithms using C and C++ ', 'public/assets/img/course/1638288445_product1.jpg', 'MSC', 12.5, 4, 'DSA', 'Learn, Analyse and Implement Data Structure using C and C++. Learn Recursion and Sorting. ', 1),
(2, 'Unreal Engine C++ Developer: Learn C++ and Make Video Games ', 'public/assets/img/course/1638288386_product2.jpg', 'phat', 9.5, 4, 'Game', 'Created in collaboration with Epic Games. Learn C++ from basics while making your first 4 video games in Unreal ', 1),
(3, 'Master the Coding Interview: Data Structures + Algorithms ', 'public/assets/img/course/1638288473_product3.jpg', 'phat', 5.5, 4.2, 'DSA', '                                                        Learn Python like a Ultimate coding interview bootcamp. Get more job offers, negotiate a raise: Everything you need to get the job you want!                                                         ', 0),
(4, 'The Complete JavaScript Course 2022: From Zero to Expert! ', 'public/assets/img/course/product4.jpg', 'Phat', 3.3, 2.5, 'Web', 'The modern JavaScript course for everyone! Master JavaScript with projects, challenges and theory. Many courses in one! ', 0),
(5, 'The Complete 2022 Web Development Bootcamp ', 'public/assets/img/course/product5.jpg', 'Phat', 12.2, 1.3, 'Web', 'Become a Full-Stack Web Developer with just ONE course. HTML, CSS, Javascript, Node, React, MongoDB, build real projects', 0),
(6, 'Complete C# Unity Game Developer 3D ', 'public/assets/img/course/product6.jpg', 'Phat', 7.8, 3.3, 'Game', 'Design & Develop Video Games. Learn C# in Unity Engine. Code Your first 3D Unity games for web, Mac & PC. ', 0),
(7, 'Machine Learning A-Z™: Hands-On Python & R In Data Science', 'public/assets/img/course/product7.jpg', 'Phi', 10.9, 4.2, 'MachineLearning', 'Learn to create Machine Learning Algorithms in Python and R from two Data Science experts. Code templates included. ', 0),
(8, 'Python for Data Science and Machine Learning Bootcamp', 'public/assets/img/course/product8.jpg', 'Long', 16.3, 2.6, 'MachineLearning', 'Learn how to use NumPy, Pandas, Seaborn , Matplotlib , Plotly , Scikit-Learn , Machine Learning, Tensorflow , and more! ', 0),
(9, 'Machine Learning, Data Science and Deep Learning with Python ', 'public/assets/img/course/product9.jpg', 'Phi', 6.8, 0.6, 'MachineLearning', 'Complete hands-on machine learning tutorial with data science, Tensorflow, artificial intelligence, and neural networks ', 0),
(10, 'The Web Developer Bootcamp 2022 ', 'public/assets/img/course/product10.jpg', 'Long', 11.1, 3.7, 'Web', 'COMPLETELY REDONE - The only course you need to learn web development - HTML, CSS, JS, Node, and More!', 0),
(11, 'Complete C# Unity Game Developer 2D ', 'public/assets/img/course/product11.jpg', 'Chinh', 8.9, 2.4, 'Game', 'Learn Unity in C# & Code Your First Five 2D Video Games for Web, Mac & PC. The Tutorials Cover Tilemap ', 0),
(12, 'RPG Core Combat Creator: Learn Intermediate Unity C# Coding', 'public/assets/img/course/product12.jpg', 'Chinh', 14.5, 4.8, 'Game', 'Build Combat for Role Playing Game (RPG) in Unity. Tutorials Cover Code Architecture & Video Game Design.', 0),
(13, 'Data Structures and Algorithms In C ', 'public/assets/img/course/product13.jpg', 'Chinh', 16.9, 5, 'DSA', 'Data Structures and Algorithms in C Using C DSA Data Structures Algorithms Competitive Programming C leetcode FAANG DSA ', 0),
(14, 'Data Structures and Algorithms Python: The Complete Bootcamp ', 'public/assets/img/course/product14.jpg', 'Long', 13.3, 4, 'DSA', 'DSA Basics To Advanced: Learn, Analyze, Implement Data Structures and Algorithms using Python With Interview Questions ', 0),
(15, 'DSA Basics To Advanced: Learn, Analyze, Implement Data Structures and Algorithms using Python With Interview Questions ', 'public/assets/img/course/product15.jpg', 'Phat', 19.8, 1.6, 'MachineLearning', 'Learn about Data Science and Machine Learning with Python! Including Numpy, Pandas, Matplotlib, Scikit-Learn and more! ', 0),
(16, 'Angular - The Complete Guide (2022 Edition) ', 'public/assets/img/course/1638288464_product16.jpg', 'Phi', 14.12, 2, 'DSA', 'Master Angular 13 (formerly \"Angular 2\") and build awesome, reactive web apps with the successor of Angular.js ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infouser`
--

CREATE TABLE `infouser` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infouser`
--

INSERT INTO `infouser` (`id`, `userID`, `fullname`, `birthday`, `phonenumber`, `address`, `facebook`, `grade`) VALUES
(19, 139, 'mai sy chinh', '2021-11-10', '0352321793', 'Da Nang', 'Chưa cód', 'Chưa cóasd'),
(34, 154, 'Mai Sy Chinh', '2021-12-17', '0352323179', 'chinh.mai@gmailcom', 'mai sy chinh', 'dai hoc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `introcourse`
--

CREATE TABLE `introcourse` (
  `id` int(11) NOT NULL,
  `output_course` text NOT NULL,
  `part` int(11) NOT NULL,
  `num_lessons` int(11) NOT NULL,
  `list_part` text NOT NULL,
  `list_lessons` text NOT NULL,
  `course_require` text NOT NULL,
  `courseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `introcourse`
--

INSERT INTO `introcourse` (`id`, `output_course`, `part`, `num_lessons`, `list_part`, `list_lessons`, `course_require`, `courseid`) VALUES
(2, 'Learn various Popular Data Structures and their Algorithms.;\r\nDevelop your Analytical skills on Data Structure and use then efficiently.;\r\nLearn Recursive Algorithms on Data Structures;\r\nLearn about various Sorting Algorithms;\r\nImplementation of Data Structures using C and C++\r\n', 11, 100, '1. Recursion;\r\n\r\n2. Arrays Representation;\r\n\r\n3. Array ADT;\r\n\r\n4. Linked List;\r\n\r\n5. Stack;\r\n\r\n6. Queues;\r\n\r\n7. Trees;\r\n\r\n8. Binary Search Tree\r\n', '1.1 How Recursion Works ( Tracing );\r\n1.2 Generalising Recursion;\r\n1.3 How Recursion uses Stack;\r\n1.4 Recurrence Relation - Time Complexity of Recursion;\r\n1.5 Lets Code Recursion;\r\n1.6 Static and Global Variables in Recursion;\r\n1.7Let\'s Code Static and Global in Recursion;\r\n1.8 Tail Recursion;\r\n1.9 Head Recursion;\r\n1.10 Tree Recursion;\r\n2.1 Introduction to Array;\r\n2.2  Declarations of Array;\r\n2.3 Demo - Array Declaration;\r\n2.4 Static vs Dynamic Arrays;\r\n2.5 Demo - Static vs Dynamic Array;\r\n2.6 How to Increase Array Size;\r\n2.7 Demo - Increasing Array Size;\r\n2.8 2D Arrays;\r\n2.9 Demo - 2D Array;\r\n2.10 Array Representation by Compiler;\r\n3.1 Inserting in an Array;\r\n3.2 Let\'s Code Insert;\r\n3.3 Deleting from Array;\r\n3.4Let\'s Code Delete;\r\n3.5Linear Search;\r\n3.6 Improving Linear Search;\r\n3.7 Let\'s Code Linear Search;\r\n3.8 Binary Search;\r\n3.9 Binary Search Algorithm;\r\n3.10 Let\'s Code Binary Search;\r\n3.11 Analysis of Binary Search;\r\n3.12 Average Case Analysis of Binary Search;\r\n4.1 Introduction to Strings;\r\n4.2 Finding Length of a String;\r\n4.3 Changing Case of a String;\r\n4.4 Counting Words and Vowels in a String;\r\n4.5 Validating a String;\r\n4.6 Reversing a String;\r\n4.7 Comparing Strings and Checking Palindrome;\r\n4.8 Finding Duplicates in a String;\r\n4.9 Finding Duplicates in a String using Bitwise Operations;\r\n4.10 Checking if 2 Strings are Anagram (distinct letters);\r\n4.11 Permutation of String;\r\nIntroduction to Stack\r\n5.1 Stack using Array;\r\n5.2 Implementation os Stack using Array;\r\n5.3 Let\'s Code Stack using Array;\r\n5.4 Stack using Linked List;\r\n5.5 Stack Operations using Linked List;\r\n5.6 Let\'s Code Stack using Linked List;\r\n5.7 Let\'s Code C++ class for Stack using Linked List;\r\n5.8 Parenthesis Matching;\r\n5.9 Program for Parenthesis Matching;\r\n5.10 Let\'s Code Parenthesis Matching;\r\n5.11 More on Parenthesis Matching;\r\n5.12 Infix to Postfix Conversion;\r\n5.13 Associativity and Unary Operators;\r\n5.14 Infix to Postfix using Stack Method 1;\r\n5.15 Infix to Postfix using Stack Method 2;\r\n6.1 Queue ADT;\r\n6.2 Queue using Single Pointer;\r\n6.3 Queue using Two Pointers;\r\n6.4 Implementing Queue using Array;\r\n6.5 Let\'s Code Queue using Array;\r\n6.6 Let\'s Code Queue in C++;\r\n6.7 Drawback of Queue using Array;\r\n6.8 Circular Queue;\r\n6.9 Let\'s Code Circular Queue;\r\n6.10 Queue using Linked List;\r\n6.11 Let\'s Code Queue using Linked List;\r\n6.12 Double Ended Queue DEQUEUE;\r\n6.13 Priority Queues;\r\n6.14 Queue using 2 Stacks;\r\n7.1 Terminology;\r\n7.2 Number of Binary Trees using N Nodes;\r\n7.3 Height vs Nodes in Binary Tree;\r\n7.4 Internal Nodes vs External Nodes in Binary Tree;\r\n7.5 Strict Binary Tree;\r\n7.6 Height vs Node of Strict Binary Tree;\r\n7.7 Internal vs External Nodes of Strict Binary Trees;\r\n7.8 n-ary Trees;\r\n7.9 Analysis of n-Ary Trees;\r\n7.10 Representation of Binary Tree;\r\n7.11 Linked Representation of Binary Tree;\r\n7.12 Full vs Complete Binary Tree;\r\n7.13 Strict vs Complete Binary Tree;\r\n7.14 Binary Tree Traversals;\r\n7.15 Binary Tree Traversal Easy Method 1;\r\n7.16 Binary Tree Traversal Easy Method 2;\r\n7.17 Binary Tree Traversal Easy Method 3;\r\n8.1 BST intro;\r\n8.2 Searching in a Binary Search Tree;\r\n8.3 Inserting in a Binary Search Tree;\r\n8.4 Recursive Insert in Binary Search Tree;\r\n8.5 Creating a Binary Search Tree;\r\n8.6 Let\'s code Binary Search Tree;\r\n8.7 Deleting from Binary Search Tree;\r\n8.8 Let\'s Code Recursive Insert and Delete on BST;\r\n8.9 Generating BST from Preorder;\r\n8.10 Program for Generating BST from Preorder;\r\n8.11 Drawbacks of Binary Search Tree;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Previous knowledge of Programming in C and C++', 1),
(3, 'C++, the games industry standard language.;\r\nHow to use the Unreal Engine 4 Editor.\r\nGit as a version control and backup system.;\r\nObject Oriented Programming and how to put it into practice.;\r\nSound effects and audio to add depth to your games.;\r\nGame design principles.;\r\nProgramming patterns and best practices.\r\nUnreal\'s Terrain Editor to create epic landscapes.;\r\nArtificial Intelligence behaviour programming for enemies.;\r\nStrong and transferable problem solving skills.;\r\nModern game development technologies and techniques.;\r\nA fundamental understanding of computers.;\r\nWrite code that is clean and to understand.;\r\nUnreal Gameplay Framework to make games easily.;\r\nAdvanced vehicle physics.;\r\nBlackboard and Behaviour Tree for customizable AI.;\r\nAnimation Blueprint for custom character animation.;\r\nC++ template programming to reduce repetition.;\r\nVector maths for game play and physics calculations.;', 6, 100, '1. Introduction and Setup;\r\n2. Triple X - Write Pure C++;\r\n3. Bulls & Cows;\r\n4. Bulding Escape;\r\n5. Toon tanks', '1.1 Install Prerequisites On MacOS;\r\n1.2 Build Unreal From Source (Linux);\r\n1.3 Install Unreal Engine 4.22;\r\n1.4 Also Install Visual Studio Code;\r\n1.5 Section Wrap-up;\r\n2.1 Introducing Triple X & Gavin;\r\n2.2 Triple X Game Design Doc;\r\n2.3 The Structure Of C++ By Example;\r\n2.4 Your First Program;\r\n2.5 Variables;\r\n2.6 const & Assigning Values;\r\n2.7 Statements & Comments;\r\n2.8 Naming & Self Documenting Code;\r\n2.9 Getting User Input;\r\n2.10 Using if and else in C++;\r\n2.11 Functions;\r\n2.12 Returning Data From Functions;\r\n2.13 Function Parameters;\r\n2.14 Comparing Values;\r\n2.15 Generating Random Number Ranges;\r\n3.1 Creating Our First Function;\r\n3.2 Finding And Replacing In VS Code;\r\n3.3 The C++ Dot Operator;\r\n3.4 Formatting FStrings;\r\n3.5 Booleans;\r\n3.6 Pre vs Post Increment / Decrement;\r\n3.7 Parameters And Arguments;\r\n3.8 Early Returns;\r\n3.9 Mid-section Quiz\r\n5 questions;\r\n3.10 Structure Of An FString;\r\n3.11 Const Member Functions;\r\n4.1 Project Intro;\r\n4.2 Pawn Class Creation;\r\n4.3 Creating Components;\r\n4.4 Forward Declarations & Capsule Component;\r\n4.5 Forward Declaration & Constructing The Capsule;\r\n4.6 Static Mesh Components;\r\n4.7 Deriving Blueprint Classes;\r\n4.8 Instance vs Default;\r\n4.9 Editing Exposed Variables;\r\n4.10 Exposing The Components;\r\n4.11 Creating Child C++ Classes;\r\n4.12 Possessing The Pawn;\r\n4.13 Handling Input;\r\n4.14 Local Offset;\r\n4.15 Movement Speed;\r\n4.16Local Rotation;\r\n4.17 Casting;\r\n4.18 Using the Mouse Cursor;\r\n4.19 Rotating The Turret;\r\n4.20 The Tower Class;\r\n4.21 Fire;\r\n5.1 Project Setup;\r\n5.2 Pawns vs Characters in C++;\r\n5.3 Character Movement Functions;\r\n5.4 Controller Aiming;\r\n5.5 Third Person Camera Spring Arm;\r\n5.6 Skeletal Animations 101;\r\n5.7 Editing Collision Meshes;\r\n5.8 Animation Blueprints 101;\r\n5.9 2D Blend Spaces;\r\n5.10 Connecting Animation To Gameplay;\r\n5.11 Inverse Transforming Vectors;\r\n5.12 Calculating Animation Speeds;\r\n', '64-bit PC capable of running Unreal 4 (recommended).;\r\nOr a Mac running MacOS 10.14 Mojave or higher;\r\nAbout 15GB of free disc space.;', 2),
(4, 'Become an advanced, confident, and modern JavaScript developer from scratch;\r\nBuild 6 beautiful real-world projects for your portfolio (not boring toy apps);\r\nBecome job-ready by understanding how JavaScript really works behind the scenes;\r\nHow to think and work like a developer: problem-solving, researching, workflows;\r\nJavaScript fundamentals: variables, if/else, operators, boolean logic, functions, arrays, objects, loops, strings, etc.;\r\nModern ES6+ from the beginning: arrow functions, destructuring, spread operator, optional chaining (ES2020), etc.;\r\nModern OOP: Classes, constructors, prototypal inheritance, encapsulation, etc.;\r\nComplex concepts like the \'this\' keyword, higher-order functions, closures, etc.;\r\nAsynchronous JavaScript: Event loop, promises, async/await, AJAX calls and APIs;\r\nHow to architect your code using flowcharts and common patterns;\r\nModern tools for 2021 and beyond: NPM, Parcel, Babel and ES6 modules;\r\nPractice your skills with 50+ challenges and assignments (solutions included);\r\nGet friendly support in the Q&A area;\r\nDesign your unique learning path according to your goals: course pathways', 2, 14, '1. Nội dung khóa học;\r\n2. Các bài thực hành', '1.1 Giới thiệu;\r\n1.2. IIFE là gì?;\r\n1.3. Scope là gì?;\r\n1.4. Khái niệm Closure?;\r\n1.5. Hoisting là gì?;\r\n1.6. Strict mode?;\r\n1.7. Value types & Reference types?;\r\n1.8. Từ khóa \"this\"?;\r\n1.9. Fn.bind() method - Phần 1;\r\n1.10. Fn.bind() method - Phần 2;\r\n1.11. Fn.call() method;\r\n1.12. Fn.apply() method;\r\n2.1. Tự code thư viện build UI;\r\n2.2. Code ứng dụng Todo List\r\n', 'Basic Javascript knowledge (variables, loops, and basic functions - that\'s all the course expects you to know!);\r\nA browser and text editor', 4),
(5, 'From beginner level to advanced level understanding of ;\r\nData Science:(Online Data Parsing, Data visualization, Data Preprocessing, Preparing data for machine learning);\r\nMachine Learning:(Supervised Machine Learning, Unsupervised Machine Learning, Implementation of algorithms form scratch, Built-in algorithms usages.);\r\namitDeep Learning:(Tensorflow, Hyperparameter tunings);\r\nWorking with some data sets which are benchmarks in industry like : Titanic, Seeds, Rock and Mine', 5, 50, '1. Introduction and overview;\r\n2. Python;\r\n3. Data science;\r\n4. Data Parsing;\r\n5. Data Visualization;\r\n6. Data preprocessing;\r\n7. Machine learning;\r\n8. Linear Regression', '1.1 An overview;\r\n2.1 Intro to python;\r\n2.2 Python crash course(1);\r\n2.3 Python crash course(2);\r\n2.4 Python crash course(3);\r\n2.5 Python crash course(4);\r\n2.6 Python Quiz Solution;\r\n3.1 Intro to datascience\r\n3.2 Types of data in DS; \r\n4.1 Introduction to Scrapy;\r\n4.2 Spider to convert one quote into structured data;\r\n4.3 Spider to convert the whole page into structured data;\r\n4.4 Spider to scrape the paginations(1);\r\n4.5 Spider to scrape the paginations(2);\r\n4.6 Spider to scrape scrolling pages(1);\r\n4.7 Spider to scrape scrolling pages(2);\r\n4.8 Spider to scrape data by submitting form;\r\n5.1 Matplotlib;\r\n5.2 Seaborn(1);\r\n5.3 Seaborn(2);\r\n5.4 Plotly;\r\n6.1 Missing Values(1);\r\n6.2 Missing Values(2);\r\n6.3 Outlier removal;\r\n6.4 Data Normalization;\r\n6.5 Encoding(1);\r\n6.6 Encoding(2);\r\n7.1 Intro to ML(1);\r\n7.2 Intro to ML(2);\r\n8.1 Linear regression(theory);\r\n8.2 Linear regression (implementation - 1);\r\n8.3 Linear regression (implementation - 2);\r\n8.4 Gradient Decent (1);\r\n8.5 Gradient Decent (2)\r\n\r\n\r\n', 'Basic Knowledge of any programming language;\r\nPassion of learning', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `course_id`, `rating`, `create_at`) VALUES
(5, 154, 1, 4, '2021-12-01 01:00:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userID` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `reply`
--

INSERT INTO `reply` (`id`, `commentID`, `comment`, `userID`, `create_at`) VALUES
(53, 107, 'giang vien chat luong', 154, '2021-12-01 01:01:15'),
(54, 108, 'noi dung bo ich', 154, '2021-12-01 01:01:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL,
  `tokenExpire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `create_at`, `token`, `tokenExpire`) VALUES
(126, 'admin0704', '$2y$10$vhILuSlUPkMBm6hP9DLZKOAqbqmpM00v8UQzuJz99/CampoGN9OAm', 'long.le01052001@hcmut.edu.vn', '2021-11-28 14:40:17', '', NULL),
(139, 'maisychinh0704', '$2y$10$Ts/7w9aFnFzsg82nw5JiuuE0K.GT7jSqE6aQrR6tuWC1CDsyiWvXa', 'chinhchuoi7420@gmail.comdsad', '2021-11-30 15:22:17', '', NULL),
(154, 'chinhbachkhoa', '$2y$10$a3YZv.f76wz7RU9HXwJlxO1WiJ5zPzQHu9CuPGT5x2hvXRRx3Sw9.', 'chinh.mai179@hcmut.edu.vn', '2021-12-01 00:49:40', '', '2021-12-01 15:33:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_buy_course`
--

CREATE TABLE `user_buy_course` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `numbercard` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_buy_course`
--

INSERT INTO `user_buy_course` (`id`, `userId`, `courseId`, `numbercard`, `create_at`) VALUES
(32, 139, 2, 12345, '2021-11-30 15:27:23'),
(33, 154, 1, 123456, '2021-12-01 01:02:22'),
(34, 154, 2, 123, '2021-12-01 01:02:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_like_course`
--

CREATE TABLE `user_like_course` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_like_course`
--

INSERT INTO `user_like_course` (`id`, `user_id`, `course_id`, `create_at`) VALUES
(10, 154, 3, '2021-12-01 01:03:09'),
(11, 154, 4, '2021-12-01 01:03:09'),
(12, 154, 5, '2021-12-01 01:03:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `infouser`
--
ALTER TABLE `infouser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `introcourse`
--
ALTER TABLE `introcourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseid` (`courseid`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Chỉ mục cho bảng `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `commentID` (`commentID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_buy_course`
--
ALTER TABLE `user_buy_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `courseId` (`courseId`);

--
-- Chỉ mục cho bảng `user_like_course`
--
ALTER TABLE `user_like_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `infouser`
--
ALTER TABLE `infouser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `introcourse`
--
ALTER TABLE `introcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT cho bảng `user_buy_course`
--
ALTER TABLE `user_buy_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `user_like_course`
--
ALTER TABLE `user_like_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `avatar`
--
ALTER TABLE `avatar`
  ADD CONSTRAINT `avatar_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `infouser`
--
ALTER TABLE `infouser`
  ADD CONSTRAINT `infouser_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `introcourse`
--
ALTER TABLE `introcourse`
  ADD CONSTRAINT `introcourse_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`commentID`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_buy_course`
--
ALTER TABLE `user_buy_course`
  ADD CONSTRAINT `user_buy_course_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_buy_course_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_like_course`
--
ALTER TABLE `user_like_course`
  ADD CONSTRAINT `user_like_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_like_course_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
