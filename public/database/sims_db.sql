--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

-- Started on 2024-12-07 18:37:34

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 24579)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id bigint NOT NULL,
    version character varying(255) NOT NULL,
    class character varying(255) NOT NULL,
    "group" character varying(255) NOT NULL,
    namespace character varying(255) NOT NULL,
    "time" integer NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 24578)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 4874 (class 0 OID 0)
-- Dependencies: 217
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 222 (class 1259 OID 32894)
-- Name: product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product (
    id integer NOT NULL,
    name_product character varying(255) NOT NULL,
    category_product character varying(255) NOT NULL,
    buy_price character varying(255) NOT NULL,
    sell_price character varying(255) NOT NULL,
    stock integer NOT NULL,
    image character varying(255) NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.product OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 32893)
-- Name: product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.product_id_seq OWNER TO postgres;

--
-- TOC entry 4875 (class 0 OID 0)
-- Dependencies: 221
-- Name: product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_id_seq OWNED BY public.product.id;


--
-- TOC entry 220 (class 1259 OID 32881)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    "position" character varying(50) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp without time zone DEFAULT '2024-12-07 03:41:42.858233'::timestamp without time zone NOT NULL,
    updated_at timestamp without time zone DEFAULT '2024-12-07 03:41:42.858233'::timestamp without time zone NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 32880)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 4876 (class 0 OID 0)
-- Dependencies: 219
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4705 (class 2604 OID 24582)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4709 (class 2604 OID 32897)
-- Name: product id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product ALTER COLUMN id SET DEFAULT nextval('public.product_id_seq'::regclass);


--
-- TOC entry 4706 (class 2604 OID 32884)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4864 (class 0 OID 24579)
-- Dependencies: 218
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, version, class, "group", namespace, "time", batch) FROM stdin;
20	2024-12-05-065110	App\\Database\\Migrations\\CreateTableUsers	default	App	1733517702	1
21	2024-12-06-023159	App\\Database\\Migrations\\CreateTableProduct	default	App	1733517702	1
\.


--
-- TOC entry 4868 (class 0 OID 32894)
-- Dependencies: 222
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product (id, name_product, category_product, buy_price, sell_price, stock, image, created_at, updated_at) FROM stdin;
2	Dumbble 5kg	Alat Olahraga	150000	195000	150	1733547875_180f206134e54e7a275b.jpg	\N	\N
4	Gitar Yamaha	Alat Olahraga	1500000	1950000	25	1733548851_8ce41da25998c2b8e883.png	\N	\N
3	Baju Barcelona 2	Alat Olahraga	150000	195000	150	1733548823_715b16a26cba3080df66.png	\N	\N
5	Baju Liverfool	Alat Olahraga	150000	195000	150	1733565457_7ba4e21b11e702a7ec6d.jpg	\N	\N
6	Gitar Yamaha22	Alat Olahraga	1800000	2340000	80	1733565503_ab5bb9a07061969deae9.png	\N	\N
7	Drums XL	Alat Olahraga	2000000	2600000	15	1733565539_16312bd0fd6265421ab6.png	\N	\N
8	Gitar Akustik	Alat Musik	150000	195000	25	1733565572_bef72e3d4209fe115e62.png	\N	\N
10	Full Set Drum	Alat Musik	5000000	6500000	24	1733565629_b37cd1ac84975f341790.png	\N	\N
11	Sepatu Futsal	Alat Olahraga	250000	325000	5	1733565662_0a62ff198e31d2d612ae.png	\N	\N
12	Drum Premium	Alat Musik	7000000	9100000	5	1733565697_4be2feeef3efc6383958.png	\N	\N
13	Baju Renang	Alat Olahraga	200000	260000	2	1733565731_96ef845b8ee98ea372a9.png	\N	\N
9	Piano	Alat Musik	2800000	3640000	51	1733565595_6b1404aafdd33d8a16c9.png	\N	\N
\.


--
-- TOC entry 4866 (class 0 OID 32881)
-- Dependencies: 220
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, "position", email, password, created_at, updated_at) FROM stdin;
6	Thomson Simbolon	Web Programmer	simbolonthomson10@gmail.com	$2y$10$iuRsuSzwnEH.uCMYo0XHvuFyv8M6Ez3IZMWWPPrmPwDpFJ.cY9PCG	2024-12-07 03:41:42.858233	2024-12-07 03:41:42.858233
\.


--
-- TOC entry 4877 (class 0 OID 0)
-- Dependencies: 217
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 21, true);


--
-- TOC entry 4878 (class 0 OID 0)
-- Dependencies: 221
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_id_seq', 13, true);


--
-- TOC entry 4879 (class 0 OID 0)
-- Dependencies: 219
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 6, true);


--
-- TOC entry 4711 (class 2606 OID 24586)
-- Name: migrations pk_migrations; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT pk_migrations PRIMARY KEY (id);


--
-- TOC entry 4717 (class 2606 OID 32901)
-- Name: product pk_product; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT pk_product PRIMARY KEY (id);


--
-- TOC entry 4713 (class 2606 OID 32890)
-- Name: users pk_users; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT pk_users PRIMARY KEY (id);


--
-- TOC entry 4715 (class 2606 OID 32892)
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


-- Completed on 2024-12-07 18:37:34

--
-- PostgreSQL database dump complete
--

