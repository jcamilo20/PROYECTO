USE [master]
GO
/****** Object:  Database [BDS_Final]    Script Date: 6/4/2020 4:30:25 PM ******/
CREATE DATABASE [BDS_Final]
GO
USE [BDS]
GO
/****** Object:  UserDefinedFunction [dbo].[FN_DiffDates]    Script Date: 6/4/2020 4:30:26 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[FN_DiffDates](
	@fcha1 datetime,
	@fcha2 datetime
)
RETURNS VARCHAR(MAX)
AS
BEGIN
	DECLARE @days INT;
    DECLARE @hours INT; 
    DECLARE @minutes INT;
    DECLARE @seconds INT;
    DECLARE @aux INT;
    DECLARE @auxFecha DATETIME;
	
	IF @fcha1 > @fcha2 
		BEGIN
			SET @auxFecha = @fcha1;
			SET @fcha1 = @fcha2;
			SET @fcha2 = @auxFecha;
		END

	SET @aux = DATEDIFF(SECOND, @fcha1, @fcha2);                            
    SET @days = @aux / 86400;                        
    SET @aux = @aux - (@days * 86400);                        
    SET @hours = @aux / 3600;  
    SET @aux = @aux - (@hours * 3600);
    SET @minutes = @aux / 60;  
    SET @aux = @aux - (@minutes * 60);       
    SET @seconds = @aux;  
	
	RETURN CONCAT(@days, ' D ', @hours, ' H ', @minutes, ' M ', @seconds, ' S');
END
GO
/****** Object:  Table [dbo].[TBL_administradores]    Script Date: 6/4/2020 4:30:26 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TBL_administradores](
	[PK_admin] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [nvarchar](max) NOT NULL,
	[apellido] [nvarchar](max) NOT NULL,
	[email] [nvarchar](max) NOT NULL,
	[password] [nvarchar](max) NOT NULL,
	[Created] [datetime] NOT NULL,
	[Updated] [datetime] NOT NULL,
 CONSTRAINT [PK_TBL_administradores] PRIMARY KEY CLUSTERED 
(
	[PK_admin] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TBL_detalle_venta]    Script Date: 6/4/2020 4:30:26 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TBL_detalle_venta](
	[PK_detalle_venta] [int] NOT NULL,
	[FK_venta] [int] NOT NULL,
	[FK_producto] [int] NOT NULL,
	[precio_unitario] [float] NOT NULL,
	[cantidad] [int] NOT NULL,
	[Created] [datetime] NOT NULL,
	[Updated] [datetime] NOT NULL,
 CONSTRAINT [PK_TBL_detalle_venta] PRIMARY KEY CLUSTERED 
(
	[PK_detalle_venta] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TBL_envios]    Script Date: 6/4/2020 4:30:26 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TBL_envios](
	[PK_envio] [int] NOT NULL,
	[FK_venta] [int] NOT NULL,
	[nombre] [nvarchar](40) NOT NULL,
	[apellido] [nvarchar](40) NOT NULL,
	[cedula] [nvarchar](15) NOT NULL,
	[direccion] [nvarchar](40) NOT NULL,
	[departamento] [nvarchar](30) NOT NULL,
	[ciudad] [nvarchar](30) NOT NULL,
	[correo] [nvarchar](50) NOT NULL,
	[celular] [nvarchar](10) NOT NULL,
	[Created] [datetime] NOT NULL,
	[Updated] [datetime] NOT NULL,
 CONSTRAINT [PK_TBL_envios] PRIMARY KEY CLUSTERED 
(
	[PK_envio] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TBL_productos]    Script Date: 6/4/2020 4:30:26 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TBL_productos](
	[PK_producto] [int] NOT NULL,
	[FK_tienda] [int] NOT NULL,
	[nombre] [nvarchar](50) NOT NULL,
	[descripcion] [nvarchar](100) NOT NULL,
	[precio] [float] NOT NULL,
	[Created] [datetime] NOT NULL,
	[Updated] [datetime] NOT NULL,
 CONSTRAINT [PK_TBL_productos] PRIMARY KEY CLUSTERED 
(
	[PK_producto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[TBL_administradores] ON 

INSERT [dbo].[TBL_administradores] ([PK_admin], [nombre], [apellido], [email], [password], [Created], [Updated]) VALUES (1, N'julian', N'rodriguez', N'julianrv920@gmail.com', N'$2y$10$xgC6VTRtqhHDiR4.8xUzneNh2EBZNWq7wdY/Im3ubuJ5lt2CcLVLq', CAST(N'2020-05-11T00:00:00.000' AS DateTime), CAST(N'2020-06-01T11:24:23.000' AS DateTime))
INSERT [dbo].[TBL_administradores] ([PK_admin], [nombre], [apellido], [email], [password], [Created], [Updated]) VALUES (2, N'daniel', N'morales', N'daniel.morales@academia.unimeta.edu.co', N'$2y$10$YG6gpw9zYSF.9Zg300w3oegbUuujlmur1wdRJ3bM4uTysXO8xO4TC', CAST(N'2020-06-01T20:58:12.000' AS DateTime), CAST(N'2020-06-01T04:09:11.000' AS DateTime))
INSERT [dbo].[TBL_administradores] ([PK_admin], [nombre], [apellido], [email], [password], [Created], [Updated]) VALUES (3, N'jesus', N'sanchez', N'jesus@gmail.com', N'$2y$10$dgFE5aKchbi4ayHsPPKt.OU6xI0EAhuA1oNA054rXqvsGXxw5wF3y', CAST(N'2020-06-01T21:27:41.000' AS DateTime), CAST(N'2020-06-01T21:27:41.000' AS DateTime))
INSERT [dbo].[TBL_administradores] ([PK_admin], [nombre], [apellido], [email], [password], [Created], [Updated]) VALUES (4, N'guillermo', N'sanchez', N'guillermo@gmail.com', N'$2y$10$npHnPGHaIo1u6zXWgTKrfuVkKiWB1csqI3l6sB/KZV/nABjrj7aaO', CAST(N'2020-06-01T21:28:07.000' AS DateTime), CAST(N'2020-06-01T21:28:07.000' AS DateTime))
INSERT [dbo].[TBL_administradores] ([PK_admin], [nombre], [apellido], [email], [password], [Created], [Updated]) VALUES (5, N'laura', N'perez', N'laura@gmail.com', N'$2y$10$2Ccq9ha.Nhbyo/HICvSdQOpR.8xO4mn6lhRcbwZ9zm7HKaR3nVr1G', CAST(N'2020-06-01T21:28:30.000' AS DateTime), CAST(N'2020-06-01T21:28:30.000' AS DateTime))
INSERT [dbo].[TBL_administradores] ([PK_admin], [nombre], [apellido], [email], [password], [Created], [Updated]) VALUES (6, N'Daniel', N'Doe', N'john@example.com', N'hello123', CAST(N'2020-05-26T04:09:11.000' AS DateTime), CAST(N'2020-05-27T04:09:11.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[TBL_administradores] OFF
INSERT [dbo].[TBL_detalle_venta] ([PK_detalle_venta], [FK_venta], [FK_producto], [precio_unitario], [cantidad], [Created], [Updated]) VALUES (3, 1, 1, 42000, 1, CAST(N'2020-06-01T20:51:16.000' AS DateTime), CAST(N'2020-06-01T20:51:16.000' AS DateTime))
INSERT [dbo].[TBL_detalle_venta] ([PK_detalle_venta], [FK_venta], [FK_producto], [precio_unitario], [cantidad], [Created], [Updated]) VALUES (4, 1, 2, 50000, 1, CAST(N'2020-06-01T20:51:38.000' AS DateTime), CAST(N'2020-06-01T20:51:38.000' AS DateTime))
INSERT [dbo].[TBL_detalle_venta] ([PK_detalle_venta], [FK_venta], [FK_producto], [precio_unitario], [cantidad], [Created], [Updated]) VALUES (5, 1, 3, 30000, 1, CAST(N'2020-06-01T20:52:12.000' AS DateTime), CAST(N'2020-06-01T20:52:12.000' AS DateTime))
INSERT [dbo].[TBL_detalle_venta] ([PK_detalle_venta], [FK_venta], [FK_producto], [precio_unitario], [cantidad], [Created], [Updated]) VALUES (6, 1, 5, 34600, 1, CAST(N'2020-06-01T20:54:02.000' AS DateTime), CAST(N'2020-06-01T20:54:02.000' AS DateTime))
INSERT [dbo].[TBL_detalle_venta] ([PK_detalle_venta], [FK_venta], [FK_producto], [precio_unitario], [cantidad], [Created], [Updated]) VALUES (7, 2, 1, 42000, 1, CAST(N'2020-06-01T20:55:06.000' AS DateTime), CAST(N'2020-06-01T20:55:06.000' AS DateTime))
INSERT [dbo].[TBL_detalle_venta] ([PK_detalle_venta], [FK_venta], [FK_producto], [precio_unitario], [cantidad], [Created], [Updated]) VALUES (8, 2, 2, 50000, 1, CAST(N'2020-06-01T20:55:21.000' AS DateTime), CAST(N'2020-06-01T20:55:21.000' AS DateTime))
INSERT [dbo].[TBL_envios] ([PK_envio], [FK_venta], [nombre], [apellido], [cedula], [direccion], [departamento], [ciudad], [correo], [celular], [Created], [Updated]) VALUES (1, 1, N'PEDRO', N'PEREZ', N'40411091', N'CR67 SUR', N'META', N'VILLAVICENCIO', N'PEDRO@GMAIL.COM', N'3116272890', CAST(N'2020-06-01T20:56:18.000' AS DateTime), CAST(N'2020-06-01T20:56:18.000' AS DateTime))
INSERT [dbo].[TBL_envios] ([PK_envio], [FK_venta], [nombre], [apellido], [cedula], [direccion], [departamento], [ciudad], [correo], [celular], [Created], [Updated]) VALUES (2, 2, N'JUAN', N'ZULUAGA', N'4039209', N'CRA 29 A NORTE', N'META', N'VILLAVICENCIO', N'JUANZ@GMAIL.COM', N'3118290902', CAST(N'2020-06-01T20:56:49.000' AS DateTime), CAST(N'2020-06-01T20:56:49.000' AS DateTime))
INSERT [dbo].[TBL_productos] ([PK_producto], [FK_tienda], [nombre], [descripcion], [precio], [Created], [Updated]) VALUES (1, 2, N'Torta tres leches', N'Rinde 20 porciones', 42000, CAST(N'2020-04-05T10:26:21.000' AS DateTime), CAST(N'2020-04-13T03:26:24.000' AS DateTime))
INSERT [dbo].[TBL_productos] ([PK_producto], [FK_tienda], [nombre], [descripcion], [precio], [Created], [Updated]) VALUES (2, 2, N'Torta milky way', N'Rinde 30 porciones', 50000, CAST(N'2020-05-03T10:23:25.000' AS DateTime), CAST(N'2020-05-20T12:30:32.000' AS DateTime))
INSERT [dbo].[TBL_productos] ([PK_producto], [FK_tienda], [nombre], [descripcion], [precio], [Created], [Updated]) VALUES (3, 2, N'Torta vainilla', N'Rinde 15 porciones', 30000, CAST(N'2020-05-10T07:28:33.000' AS DateTime), CAST(N'2020-05-29T11:28:30.000' AS DateTime))
INSERT [dbo].[TBL_productos] ([PK_producto], [FK_tienda], [nombre], [descripcion], [precio], [Created], [Updated]) VALUES (4, 2, N'Torta fortnite', N'Torta personalizada', 42000, CAST(N'2020-05-11T15:39:39.000' AS DateTime), CAST(N'2020-05-28T11:29:30.000' AS DateTime))
INSERT [dbo].[TBL_productos] ([PK_producto], [FK_tienda], [nombre], [descripcion], [precio], [Created], [Updated]) VALUES (5, 5, N'Aguardiente Antioqueño', N'Botella X 750ml', 34600, CAST(N'2020-06-01T20:53:34.000' AS DateTime), CAST(N'2020-06-01T20:53:34.000' AS DateTime))
/****** Object:  StoredProcedure [dbo].[SP_Audita1B]    Script Date: 6/4/2020 4:30:26 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[SP_Audita1B]
AS
BEGIN
	SELECT TOP 1 apellido, email, Updated, Created, nombre, PK_admin 
	FROM TBL_administradores 
	ORDER BY PK_admin;
END



GO
USE [master]
GO
ALTER DATABASE [BDS_Final] SET  READ_WRITE 
GO
