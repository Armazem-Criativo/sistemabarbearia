USE [master]
GO
/****** Object:  Database [barbearia]    Script Date: 02/07/2024 10:35:33 ******/
CREATE DATABASE [barbearia]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'barbearia', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\barbearia.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'barbearia_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\barbearia_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [barbearia] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [barbearia].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [barbearia] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [barbearia] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [barbearia] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [barbearia] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [barbearia] SET ARITHABORT OFF 
GO
ALTER DATABASE [barbearia] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [barbearia] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [barbearia] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [barbearia] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [barbearia] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [barbearia] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [barbearia] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [barbearia] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [barbearia] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [barbearia] SET  DISABLE_BROKER 
GO
ALTER DATABASE [barbearia] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [barbearia] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [barbearia] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [barbearia] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [barbearia] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [barbearia] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [barbearia] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [barbearia] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [barbearia] SET  MULTI_USER 
GO
ALTER DATABASE [barbearia] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [barbearia] SET DB_CHAINING OFF 
GO
ALTER DATABASE [barbearia] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [barbearia] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [barbearia] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [barbearia] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [barbearia] SET QUERY_STORE = ON
GO
ALTER DATABASE [barbearia] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [barbearia]
GO
/****** Object:  Table [dbo].[cache]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cache](
	[key] [nvarchar](191) NOT NULL,
	[value] [nvarchar](max) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[cache_locks]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cache_locks](
	[key] [nvarchar](191) NOT NULL,
	[owner] [nvarchar](191) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_locks_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[clients]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[clients](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](191) NOT NULL,
	[cpf] [nvarchar](191) NOT NULL,
	[address] [nvarchar](191) NOT NULL,
	[birthdate] [nvarchar](191) NOT NULL,
	[phone] [nvarchar](191) NOT NULL,
	[sort] [int] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[email] [nvarchar](191) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[employees]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[employees](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](191) NOT NULL,
	[cpf] [nvarchar](191) NOT NULL,
	[address] [nvarchar](max) NOT NULL,
	[position] [nvarchar](191) NOT NULL,
	[phone] [nvarchar](191) NOT NULL,
	[birthdate] [date] NULL,
	[email] [nvarchar](191) NOT NULL,
	[sort] [int] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[failed_jobs]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[uuid] [nvarchar](191) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[job_batches]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[job_batches](
	[id] [nvarchar](191) NOT NULL,
	[name] [nvarchar](191) NOT NULL,
	[total_jobs] [int] NOT NULL,
	[pending_jobs] [int] NOT NULL,
	[failed_jobs] [int] NOT NULL,
	[failed_job_ids] [nvarchar](max) NOT NULL,
	[options] [nvarchar](max) NULL,
	[cancelled_at] [int] NULL,
	[created_at] [int] NOT NULL,
	[finished_at] [int] NULL,
 CONSTRAINT [job_batches_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[jobs]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[queue] [nvarchar](191) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[attempts] [tinyint] NOT NULL,
	[reserved_at] [int] NULL,
	[available_at] [int] NOT NULL,
	[created_at] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](191) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_reset_tokens]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_reset_tokens](
	[email] [nvarchar](191) NOT NULL,
	[token] [nvarchar](191) NOT NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [password_reset_tokens_email_primary] PRIMARY KEY CLUSTERED 
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[payments]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[payments](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[formpay] [nvarchar](191) NOT NULL,
	[parcel] [nvarchar](191) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[schedulings]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[schedulings](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[id_client] [bigint] NOT NULL,
	[id_employee] [bigint] NOT NULL,
	[id_service] [bigint] NOT NULL,
	[id_payment] [bigint] NOT NULL,
	[date] [date] NOT NULL,
	[status] [nvarchar](191) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[services]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[services](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[service] [nvarchar](191) NOT NULL,
	[value] [nvarchar](191) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sessions]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sessions](
	[id] [nvarchar](191) NOT NULL,
	[user_id] [bigint] NULL,
	[ip_address] [nvarchar](45) NULL,
	[user_agent] [nvarchar](max) NULL,
	[payload] [nvarchar](max) NOT NULL,
	[last_activity] [int] NOT NULL,
 CONSTRAINT [sessions_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 02/07/2024 10:35:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](191) NOT NULL,
	[email] [nvarchar](191) NOT NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](191) NOT NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[id_employee] [bigint] NOT NULL,
	[role] [nvarchar](191) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[clients] ON 

INSERT [dbo].[clients] ([id], [name], [cpf], [address], [birthdate], [phone], [sort], [created_at], [updated_at], [email]) VALUES (1, N'Oswaldo da Silva', N'656.464.879-03', N'Rua Oswaldo Cruz, 323', N'1964-10-21', N'(54) 98462-1134', NULL, NULL, NULL, N'oswaldodasilva@gmail.com')
INSERT [dbo].[clients] ([id], [name], [cpf], [address], [birthdate], [phone], [sort], [created_at], [updated_at], [email]) VALUES (3, N'Otávio', N'546.313.878-88', N'Rua Zero Hora', N'1999-10-05', N'(54) 99131-0131', NULL, NULL, NULL, N'otavio@gmail.com')
INSERT [dbo].[clients] ([id], [name], [cpf], [address], [birthdate], [phone], [sort], [created_at], [updated_at], [email]) VALUES (4, N'Sérgio', N'021.213.442-31', N'Rua Grostolli', N'1982-06-26', N'(54) 92312-3101', NULL, NULL, NULL, N'sergio313@gmail.com')
INSERT [dbo].[clients] ([id], [name], [cpf], [address], [birthdate], [phone], [sort], [created_at], [updated_at], [email]) VALUES (5, N'Brendo', N'321.648.311-54', N'Rua Jardim das Taquaras', N'2002-06-11', N'(54) 93121-0313', NULL, NULL, NULL, N'brendogamer@gmail.com')
INSERT [dbo].[clients] ([id], [name], [cpf], [address], [birthdate], [phone], [sort], [created_at], [updated_at], [email]) VALUES (6, N'Everaldo da Silva', N'031.987.031-87', N'Rua Abenor Antônio Ferreira, 128', N'1998-01-13', N'(31) 55655-0510', NULL, NULL, NULL, N'epsilva@gmail.com')
SET IDENTITY_INSERT [dbo].[clients] OFF
GO
SET IDENTITY_INSERT [dbo].[employees] ON 

INSERT [dbo].[employees] ([id], [name], [cpf], [address], [position], [phone], [birthdate], [email], [sort], [created_at], [updated_at]) VALUES (42, N'Gustavo', N'000.678.114-78', N'Rua teste', N'Funcionário', N'(54) 99700-3697', CAST(N'2024-06-06' AS Date), N'gustavoraulinodsilva@gmail.com', NULL, NULL, NULL)
INSERT [dbo].[employees] ([id], [name], [cpf], [address], [position], [phone], [birthdate], [email], [sort], [created_at], [updated_at]) VALUES (44, N'Adailson', N'061.056.987-61', N'Rua teste dois', N'Funcionário', N'(54) 98462-1134', CAST(N'1982-12-23' AS Date), N'adailsonteste@gmail.com', NULL, NULL, NULL)
INSERT [dbo].[employees] ([id], [name], [cpf], [address], [position], [phone], [birthdate], [email], [sort], [created_at], [updated_at]) VALUES (45, N'Administrador', N'001.546.897-45', N'Rua do Administrador', N'Administrador', N'(54) 99301-0321', CAST(N'1987-05-19' AS Date), N'admin_barbearia@gmail.com', NULL, NULL, NULL)
INSERT [dbo].[employees] ([id], [name], [cpf], [address], [position], [phone], [birthdate], [email], [sort], [created_at], [updated_at]) VALUES (46, N'Atendente', N'023.123.544-73', N'Rua atendente', N'Atendente', N'(54) 99126-5465', CAST(N'1995-01-26' AS Date), N'atendente_barbearia@gmail.com', NULL, NULL, NULL)
INSERT [dbo].[employees] ([id], [name], [cpf], [address], [position], [phone], [birthdate], [email], [sort], [created_at], [updated_at]) VALUES (47, N'FuncionarioTeste', N'545.022.031-89', N'Rua do funcionário teste, 2202', N'Funcionário', N'(51) 98525-0589', CAST(N'1998-06-01' AS Date), N'funcionariotestebarber@gmail.com', NULL, NULL, NULL)
INSERT [dbo].[employees] ([id], [name], [cpf], [address], [position], [phone], [birthdate], [email], [sort], [created_at], [updated_at]) VALUES (48, N'FuncionarioTesteDois', N'321.984.343-78', N'Rua func teste dois, 24', N'Funcionário', N'(54) 98674-1315', CAST(N'1987-09-21' AS Date), N'functestedois202@gmail.com', NULL, NULL, NULL)
SET IDENTITY_INSERT [dbo].[employees] OFF
GO
SET IDENTITY_INSERT [dbo].[migrations] ON 

INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (1, N'0001_01_01_000000_create_users_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (2, N'0001_01_01_000001_create_cache_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (3, N'0001_01_01_000002_create_jobs_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (5, N'2024_06_23_000820_create_employees_table', 2)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (6, N'2024_06_26_015838_create_clients_table', 3)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (8, N'2024_06_26_020409_create_services_table', 4)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (9, N'2024_06_26_021334_create_payments_table', 5)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (10, N'2024_06_26_132115_add_new_field_email', 6)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (11, N'2024_06_26_203601_create_schedulings_table', 7)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (12, N'2024_06_27_011746_add_new_field_fk_employee', 8)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (13, N'2024_06_27_165514_add_new_field_rule', 9)
SET IDENTITY_INSERT [dbo].[migrations] OFF
GO
SET IDENTITY_INSERT [dbo].[payments] ON 

INSERT [dbo].[payments] ([id], [formpay], [parcel], [created_at], [updated_at]) VALUES (1, N'Dinheiro', N'à vista', NULL, NULL)
INSERT [dbo].[payments] ([id], [formpay], [parcel], [created_at], [updated_at]) VALUES (2, N'Cartão de Débito', N'à vista', NULL, NULL)
INSERT [dbo].[payments] ([id], [formpay], [parcel], [created_at], [updated_at]) VALUES (3, N'Cartão de Crédito', N'em até 5 vezes sem juros', NULL, NULL)
INSERT [dbo].[payments] ([id], [formpay], [parcel], [created_at], [updated_at]) VALUES (5, N'Pix', N'à vista', NULL, NULL)
INSERT [dbo].[payments] ([id], [formpay], [parcel], [created_at], [updated_at]) VALUES (6, N'PicPay | Paypal', N'à vista', NULL, NULL)
SET IDENTITY_INSERT [dbo].[payments] OFF
GO
SET IDENTITY_INSERT [dbo].[schedulings] ON 

INSERT [dbo].[schedulings] ([id], [id_client], [id_employee], [id_service], [id_payment], [date], [status], [created_at], [updated_at]) VALUES (1, 1, 44, 3, 1, CAST(N'2024-06-29' AS Date), N'Agendado', NULL, NULL)
INSERT [dbo].[schedulings] ([id], [id_client], [id_employee], [id_service], [id_payment], [date], [status], [created_at], [updated_at]) VALUES (2, 3, 42, 1, 5, CAST(N'2024-06-28' AS Date), N'Agendado', NULL, NULL)
INSERT [dbo].[schedulings] ([id], [id_client], [id_employee], [id_service], [id_payment], [date], [status], [created_at], [updated_at]) VALUES (4, 6, 42, 3, 1, CAST(N'2024-07-01' AS Date), N'Agendado', NULL, NULL)
INSERT [dbo].[schedulings] ([id], [id_client], [id_employee], [id_service], [id_payment], [date], [status], [created_at], [updated_at]) VALUES (5, 6, 44, 3, 5, CAST(N'2024-07-04' AS Date), N'Agendado', NULL, NULL)
INSERT [dbo].[schedulings] ([id], [id_client], [id_employee], [id_service], [id_payment], [date], [status], [created_at], [updated_at]) VALUES (6, 5, 47, 5, 2, CAST(N'2024-07-03' AS Date), N'Agendado', NULL, NULL)
INSERT [dbo].[schedulings] ([id], [id_client], [id_employee], [id_service], [id_payment], [date], [status], [created_at], [updated_at]) VALUES (8, 3, 48, 3, 3, CAST(N'2024-07-03' AS Date), N'Agendado', NULL, NULL)
SET IDENTITY_INSERT [dbo].[schedulings] OFF
GO
SET IDENTITY_INSERT [dbo].[services] ON 

INSERT [dbo].[services] ([id], [service], [value], [created_at], [updated_at]) VALUES (1, N'Corte de Cabelo', N'R$ 50,00', NULL, NULL)
INSERT [dbo].[services] ([id], [service], [value], [created_at], [updated_at]) VALUES (2, N'Corte da Barba', N'R$ 25,00', NULL, NULL)
INSERT [dbo].[services] ([id], [service], [value], [created_at], [updated_at]) VALUES (3, N'Corte de Cabelo e Barba', N'R$ 75,00', NULL, NULL)
INSERT [dbo].[services] ([id], [service], [value], [created_at], [updated_at]) VALUES (5, N'Sobrancelha', N'R$ 40,00', NULL, NULL)
INSERT [dbo].[services] ([id], [service], [value], [created_at], [updated_at]) VALUES (6, N'Hidratação facial', N'R$ 35,00', NULL, NULL)
SET IDENTITY_INSERT [dbo].[services] OFF
GO
INSERT [dbo].[sessions] ([id], [user_id], [ip_address], [user_agent], [payload], [last_activity]) VALUES (N'eo4fbQ91PT95Vn1Sd8LLXyeeetUbb7TrFmCv1rev', NULL, N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', N'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWY1dmZOZktPQzJiU3VJQTNOR2xGelZMMTA4RTlRNDh5YU9YMWpSeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1719622856)
GO
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([id], [name], [email], [email_verified_at], [password], [remember_token], [created_at], [updated_at], [id_employee], [role]) VALUES (1, N'adminbarber', N'admin_barbearia@gmail.com', NULL, N'$2y$12$7zFnznZDLjAAw9pK/rMHKuEBNnAGlxYNuHX11CGcHXbifG6BFOn.K', NULL, NULL, NULL, 45, N'admin')
INSERT [dbo].[users] ([id], [name], [email], [email_verified_at], [password], [remember_token], [created_at], [updated_at], [id_employee], [role]) VALUES (2, N'grsilva23', N'gustavoraulinodasilva@gmail.com', NULL, N'$2y$12$bDWhj6OvksCRh.weX1ce8eWU7hx/47i4KWVQe0zyUvtSy3zFpHrIq', NULL, NULL, NULL, 42, N'funcionario')
INSERT [dbo].[users] ([id], [name], [email], [email_verified_at], [password], [remember_token], [created_at], [updated_at], [id_employee], [role]) VALUES (3, N'atendentebarber', N'atendente_barbearia@gmail.com', NULL, N'$2y$12$ypSWt1K1q0dtYkLcnS4wbOOH/gbWuF4fWGTGRcFdt2.sZMQ8mBRHS', NULL, NULL, NULL, 46, N'atendente')
INSERT [dbo].[users] ([id], [name], [email], [email_verified_at], [password], [remember_token], [created_at], [updated_at], [id_employee], [role]) VALUES (6, N'functeste', N'functeste@gmail.com', NULL, N'$2y$12$2wJyYWNE1PyKGtnvUE2Tg.91xMf1WlK52LEeajzEmlC9JzcxRgL9q', NULL, NULL, NULL, 47, N'funcionario')
INSERT [dbo].[users] ([id], [name], [email], [email_verified_at], [password], [remember_token], [created_at], [updated_at], [id_employee], [role]) VALUES (7, N'functestedoiss', N'functestedois@gmail.com', NULL, N'$2y$12$rcGpL6zFmN58vMnp010jo.k0HZHCYgYsYvK0JKNsQChTM.giRAk32', NULL, NULL, NULL, 48, N'funcionario')
SET IDENTITY_INSERT [dbo].[users] OFF
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [employees_cpf_unique]    Script Date: 02/07/2024 10:35:34 ******/
CREATE UNIQUE NONCLUSTERED INDEX [employees_cpf_unique] ON [dbo].[employees]
(
	[cpf] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [employees_email_unique]    Script Date: 02/07/2024 10:35:34 ******/
CREATE UNIQUE NONCLUSTERED INDEX [employees_email_unique] ON [dbo].[employees]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [failed_jobs_uuid_unique]    Script Date: 02/07/2024 10:35:34 ******/
CREATE UNIQUE NONCLUSTERED INDEX [failed_jobs_uuid_unique] ON [dbo].[failed_jobs]
(
	[uuid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [jobs_queue_index]    Script Date: 02/07/2024 10:35:34 ******/
CREATE NONCLUSTERED INDEX [jobs_queue_index] ON [dbo].[jobs]
(
	[queue] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [sessions_last_activity_index]    Script Date: 02/07/2024 10:35:34 ******/
CREATE NONCLUSTERED INDEX [sessions_last_activity_index] ON [dbo].[sessions]
(
	[last_activity] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [sessions_user_id_index]    Script Date: 02/07/2024 10:35:34 ******/
CREATE NONCLUSTERED INDEX [sessions_user_id_index] ON [dbo].[sessions]
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_email_unique]    Script Date: 02/07/2024 10:35:34 ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique] ON [dbo].[users]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO
USE [master]
GO
ALTER DATABASE [barbearia] SET  READ_WRITE 
GO
