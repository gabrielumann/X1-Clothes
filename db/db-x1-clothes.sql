-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2024 às 02:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db-x1-clothes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cep` char(8) NOT NULL,
  `state` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Jordan'),
(4, 'Cortez'),
(5, 'A Bathing Ape'),
(7, 'Supreme'),
(8, 'Luis Vuitton'),
(10, 'Yeezy'),
(11, 'Syna'),
(12, '1of1'),
(13, 'Nocta'),
(14, 'New Balance'),
(15, 'Trapstar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `description`) VALUES
(1, 'Vendas'),
(2, 'Envio'),
(3, 'Pagamento'),
(4, 'Contato'),
(5, 'Devolução');

-- --------------------------------------------------------

--
-- Estrutura para tabela `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `faq_questions`
--

INSERT INTO `faq_questions` (`id`, `category_id`, `question`, `answer`) VALUES
(1, 1, 'Como posso fazer uma compra na X1 Clothes?', 'Para fazer uma compra na X1 Clothes, basta navegar pelo nosso site, selecionar os produtos desejados, \n adicionar ao carrinho de compras e seguir as instruções para finalizar o pedido.'),
(2, 2, 'Vocês oferecem frete grátis?', 'Sim, oferecemos frete grátis para compras acima de um determinado valor. \n  Esse valor pode variar de acordo com promoções e campanhas vigentes. \n  Consulte nosso site para informações atualizadas sobre frete grátis.'),
(3, 3, 'Quais são as opções de pagamento disponíveis?', ' Aceitamos cartões de crédito (Visa, MasterCard, American Express), \n transferência bancária e pagamento através de plataformas online como PayPal.'),
(4, 2, 'Como posso rastrear meu pedido?', 'Assim que seu pedido for enviado, \n você receberá um e-mail de confirmação com um número de rastreamento. \n Esse número permite que você acompanhe o status da entrega diretamente no site da transportadora.'),
(5, 1, 'Posso devolver ou trocar um produto?', 'Sim, aceitamos devoluções e trocas dentro de um período de 7 dias após a entrega, \n  desde que os produtos estejam em condições originais, \n  não usados e com as etiquetas originais intactas. Consulte nossa política de devolução para mais detalhes.'),
(6, 4, 'Vocês têm uma loja física onde posso experimentar os produtos?', 'Atualmente, a X1 Clothes opera exclusivamente online. \n Isso nos permite oferecer uma ampla seleção de produtos e preços competitivos diretamente aos nossos clientes em todo o país.'),
(7, 4, 'Como posso entrar em contato com o serviço de atendimento ao cliente da X1 Clothes?', 'Para entrar em contato com nosso serviço de atendimento ao cliente você pode: enviar um e-mail para x1clothes@suporte.com, \n preencher o formulário de contato em nosso site ou nos contatar através das nossas redes sociais.'),
(8, 1, 'Como posso ficar por dentro das últimas novidades e promoções da X1 Clothes?', 'Para ficar atualizado sobre as últimas novidades, lançamentos de produtos e promoções exclusivas recomendamos que você se inscreva em nossa newsletter e nos siga nas redes sociais.'),
(9, 1, 'Vocês oferecem garantia nos produtos da X1 Clothes?', 'Sim, todos os produtos da X1 Clothes são cobertos pela garantia contra defeitos de fabricação. \n Caso você identifique algum problema com seu produto, \n entre em contato conosco e iremos orientá-lo sobre os próximos passos para resolver a questão da melhor forma possível.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipped_date` date DEFAULT NULL,
  `shipped_hour` time DEFAULT NULL,
  `shipped_status` enum('PENDENT','SENDED','FINISHED') NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_brl` double NOT NULL DEFAULT 0,
  `color` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `name`, `price_brl`, `color`, `category_id`, `brand_id`, `size_id`) VALUES
(66, 'Yeezy 350 V2 MX Dark Salt', 999.99, 'preto', 1, 10, 7),
(67, 'New Balance 9060 Moonbeam Sea Salt', 1049.99, 'Off White', 1, 14, 7),
(68, 'Union LA x Nike Cortez SP Sesame', 950, 'Laranja', 1, 1, 7),
(69, 'Air Jordan 4 RM Pink Oxford', 1950, 'Rosa', 1, 3, 7),
(70, 'Jaqueta Exclusiviist Faux Leather', 998.99, 'Preto', 6, 12, 6),
(71, 'BAPE BLACK Ring #8', 2899.99, 'Prata', 8, 5, 5),
(72, 'BAPE Solid Camo Jacquard Down Jacket', 1799.99, 'Beige', 6, 5, 6),
(74, 'Trapstar X Adwoa Jeans ', 780, 'Azul', 3, 15, 6),
(76, 'teste1', 123123, '1231231', 1, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `image`) VALUES
(1, 'Tênis', NULL),
(2, 'Camisetas', NULL),
(3, 'Calças', NULL),
(4, 'Assesórios', NULL),
(5, 'Shorts', NULL),
(6, 'Moletons/Jaquetas', NULL),
(8, 'joias', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('PRINCIPAL','SECONDARY') NOT NULL,
  `product_id` int(11) NOT NULL,
  `complementary_order` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `type`, `product_id`, `complementary_order`) VALUES
(183, 'storage/images/products/2024/11/672d777f48d82-product-3.png', 'PRINCIPAL', 66, NULL),
(184, 'storage/images/products/2024/11/672d77928a3a4-22.png', 'SECONDARY', 66, 1),
(185, 'storage/images/products/2024/11/672d777f59d90-23.png', 'SECONDARY', 66, 2),
(186, 'storage/images/products/2024/11/672d777f63021-24.png', 'SECONDARY', 66, 3),
(187, 'storage/images/products/2024/11/672d777f6f00f-25.png', 'SECONDARY', 66, 4),
(188, 'storage/images/products/2024/11/6732089c28a65-1.png', 'PRINCIPAL', 67, NULL),
(189, 'storage/images/products/2024/11/6732089c316a9-2.png', 'SECONDARY', 67, 1),
(190, 'storage/images/products/2024/11/6732089c39db7-3.png', 'SECONDARY', 67, 2),
(191, 'storage/images/products/2024/11/6732089c42290-4.png', 'SECONDARY', 67, 3),
(192, 'storage/images/products/2024/11/6732089c49dea-5.png', 'SECONDARY', 67, 4),
(193, 'storage/images/products/2024/11/673208f2f2ed4-1.png', 'PRINCIPAL', 68, NULL),
(194, 'storage/images/products/2024/11/673208f308f4e-2.png', 'SECONDARY', 68, 1),
(195, 'storage/images/products/2024/11/673208f3128ad-3.png', 'SECONDARY', 68, 2),
(196, 'storage/images/products/2024/11/673208f31de6f-4.png', 'SECONDARY', 68, 3),
(197, 'storage/images/products/2024/11/673208f326f8c-5.png', 'SECONDARY', 68, 4),
(198, 'storage/images/products/2024/11/673209293f1c2-1.png', 'PRINCIPAL', 69, NULL),
(199, 'storage/images/products/2024/11/673209294847b-2.png', 'SECONDARY', 69, 1),
(200, 'storage/images/products/2024/11/67320929505cd-3.png', 'SECONDARY', 69, 2),
(201, 'storage/images/products/2024/11/673209295b53e-4.png', 'SECONDARY', 69, 3),
(202, 'storage/images/products/2024/11/6732092963ac7-5.png', 'SECONDARY', 69, 4),
(203, 'storage/images/products/2024/11/673210c216859-2.png', 'PRINCIPAL', 70, NULL),
(204, 'storage/images/products/2024/11/673210c21ef8a-1.png', 'SECONDARY', 70, 1),
(205, 'storage/images/products/2024/11/673210c22772c-3.png', 'SECONDARY', 70, 2),
(206, 'storage/images/products/2024/11/673210c237809-4.png', 'SECONDARY', 70, 3),
(207, 'storage/images/products/2024/11/673210c248dd7-5.png', 'SECONDARY', 70, 4),
(208, 'storage/images/products/2024/11/67321136e12df-trapstar-x-adwoa-jeans-blue.png', 'PRINCIPAL', 71, NULL),
(209, 'storage/images/products/2024/11/6732110f17bfb-2.png', 'SECONDARY', 71, 1),
(210, 'storage/images/products/2024/11/6732110f20b93-5.png', 'SECONDARY', 71, 2),
(211, 'storage/images/products/2024/11/6732110f2921f-3.png', 'SECONDARY', 71, 3),
(212, 'storage/images/products/2024/11/6732110f32c3a-4.png', 'SECONDARY', 71, 4),
(213, 'storage/images/products/2024/11/673211893cc3b-1.png', 'PRINCIPAL', 72, NULL),
(214, 'storage/images/products/2024/11/6732118947f4e-2.png', 'SECONDARY', 72, 1),
(215, 'storage/images/products/2024/11/6732118953791-3.png', 'SECONDARY', 72, 2),
(216, 'storage/images/products/2024/11/673211895eaa8-4.png', 'SECONDARY', 72, 3),
(217, 'storage/images/products/2024/11/673211896e47d-5.png', 'SECONDARY', 72, 4),
(223, 'storage/images/products/2024/11/673212c4169f1-1.png', 'PRINCIPAL', 74, NULL),
(224, 'storage/images/products/2024/11/673212c41fde6-2.png', 'SECONDARY', 74, 1),
(225, 'storage/images/products/2024/11/673212c42c22d-3.png', 'SECONDARY', 74, 2),
(228, 'storage/images/products/2024/11/6745d1ffdde4f-1.png', 'PRINCIPAL', 76, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(5, 'Tamanho único'),
(6, 'Tamanho para Roupas. Ex: P, M, G'),
(7, 'Tamanho para Tenis. Ex: 39,40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpf` char(11) NOT NULL,
  `role` enum('ADMIN','DEFAULT') NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `cpf`, `role`, `image`) VALUES
(2, 'Lucas', 'Neves', 'default@default.com', 'default', '12345678910', 'DEFAULT', 'storage/images/user/2024/11/672d7595efc82-21.png'),
(3, 'Jorge', 'Carvalho', 'jorge@gmail.com', '$2y$10$iavfB9tGvoNXOPMNE2yI7.zBLbh92BctE2KWd8qJqZ55lMOl5YjNu', '12345678910', 'DEFAULT', 'storage/images/user/2024/11/672d704b22ced-user-2.png'),
(12, 'Gabriel', 'Umann', 'gu@admin.com', '$2y$10$vWnCUMqwFlu0QNpVbjTZ..S.l4tVcAw8myJHW/G/CbgW61jOeb74e', '12345678910', 'ADMIN', 'storage/images/user/2024/11/672d75dc83c57-20.png'),
(13, 'Douglas', 'Duarte', 'douglas@gmail.com', '$2y$10$lhwOnuMqp6FvKDP8b.9Iv.ZhWL1arMQedQgp1qaq/a6HLBYHfI1ni', '12312312312', 'DEFAULT', 'storage/images/user/2024/11/674711af279dd-1.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices de tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Índices de tabela `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Índices de tabela `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices de tabela `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD CONSTRAINT `faq_questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`);

--
-- Restrições para tabelas `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);

--
-- Restrições para tabelas `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Restrições para tabelas `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Restrições para tabelas `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Restrições para tabelas `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
