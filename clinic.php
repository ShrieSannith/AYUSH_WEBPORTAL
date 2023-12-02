<?php
// Include the database configuration
include('connection.php'); // Assuming you have a connection.php file with database connection code

// Start the session (if not already started)
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['U_ID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AYU-SYNC</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <style>
    #map {
      height: 600px;
    }
  </style>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css"> 
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>  

    <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
    <script type="text/javascript">
    var map = null;

    function getMap()
    {
        map = new Microsoft.Maps.Map(document.getElementById('myMap'), {credentials: 'AvhVbZCdMLPaXUlW71ZPPyqpFaR1wPcBwxLAmAQ6DXBLrL5SOLieWGt6rF-4qGng'});
    }   
    </script>
    <style>
    /* Style the button */
    .custom-button {
        background-color: #007bff; /* Button background color */
        color: white; /* Text color */
        border: none; /* Remove button border */
        border-radius: 5px; /* Add rounded corners */
        padding: 10px 20px; /* Add padding */
        font-size: 18px; /* Adjust font size */
        transition: background-color 0.3s, color 0.3s; /* Add smooth transition effect */
        text-decoration: none; /* Remove underlines from anchor */
    }

    /* Style the button on hover */
    .custom-button:hover {
        background-color: #0056b3; /* New background color on hover */
        color: #fff; /* New text color on hover */
    }
</style>
 
</head>
<body class="size-1520 primary-color-red background-dark">
      <!-- HEADER -->
      <header class="grid">
        <!-- Top Navigation -->
        <nav class="s-12 grid background-none background-primary-hightlight" style="background-color: aliceblue;">
           <!-- logo -->
           <?php if ($loggedIn) : ?>
    <a href="welcome.php" class="m-12 l-3 padding-2x logo">
<?php else : ?>
    <a href="index.php" class="m-12 l-3 padding-2x logo">
<?php endif; ?>  
            <div style="display: inline-flex;">
              <img style="width: 100px; height: 50px; margin-right: 10px;" src="img/logo.jpg"></img>
              <img style="width: 70px; height: 50px; margin-left: 10px;" src="img/g20.jpg"></img>
              <h1 style="margin-left: 10px; margin-top: -10px; font-weight: 700; font-size: 40px;">AYUSH</h1>
           </div>
           </a>
           <div class="top-nav s-12 l-9" style="margin-top: 10px;"> 
              <ul class="top-ul right chevron">
              <?php if ($loggedIn) : ?>
                <li><a href="welcome.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="index.php">Home</a></li>
                    <?php endif; ?>                
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="schemes.php">Schemes</a></li>
                <li><a href="clinic.php">Clinics</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if ($loggedIn) : ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else : ?>
                        <li><a href="auth.php">Login</a></li>
                    <?php endif; ?>
                </ul>
           </div>
        </nav>
      </header>

<main role="main">
<!-- TOP SECTION -->
<header class="grid">
    <div class="s-12 padding-2x">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">Ayush Clinics Near You</h1>
        </div>
    </div>
</header>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Get the user's current location
        navigator.geolocation.getCurrentPosition(function (position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;

            const map = L.map('map').setView([userLat, userLng], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Calculate the distance to AYUSH centers and find the closest ones
            const ayushCenters = [
        {
          name: "National Institute Of Siddha Hospital",
          latlng: [12.938361859889998, 80.12847406688157], 
        },
        {
          name: "Dhanwanthralaya Ayurveda Speciality Hospital",
          latlng: [12.931095608923785, 80.10705729386295],
        },
        {
          name: "Shanta Ayurveda Hospital",
          latlng: [13.042213337166023, 80.24467452455623], 
        },
        {
          name: "Regional Research Institute Of Unani Medicine Govt Unani Hospital ( Accredited by NABH ) ",
          latlng: [13.113405370296741, 80.29571529572108],
        },
        {
          name: "Sri Sai Ram Homoeopathy Medical College & Research Centre",
          latlng: [12.958157710351212, 80.05891463990045], 
        },
  {
    "name": "SANJEEVINI AYUSH CLINIC",
    "latlng": [12.9126605, 80.1898632]
  },
  {
    "name": "Ocean Ayush care",
    "latlng": [12.9835049, 80.2616946]
  },
  {
    "name": "Ayush wellness centre",
    "latlng": [13.0099021, 80.217946]
  },
  {
    "name": "Usha Ayush Medicals and Clinic",
    "latlng": [13.1098293, 80.1521211]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [13.0237418, 80.2427197]
  },
  {
    "name": "DNA Ayush Facility",
    "latlng": [13.0372974, 80.2414311]
  },
  {
    "name": "AYUSH HOSPITAL TIRUVOTTIYUR",
    "latlng": [13.164122, 80.30334]
  },
  {
    "name": "AYUSH SIDDHA CLINIC",
    "latlng": [13.132272, 80.1929614]
  },
  {
    "name": "NAVAAYUR",
    "latlng": [13.0393935, 80.2394903]
  },
  {
    "name": "Ayurshi Ayurveda Panchakarma Centre",
    "latlng": [13.0278924, 80.1622094]
  },
  {
    "name": "Ayushcareever",
    "latlng": [13.068941, 80.2258246]
  },
  {
    "name": "Ayush Diagnostics",
    "latlng": [12.9812096, 80.189537]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [13.1234569, 80.1501877]
  },
  {
    "name": "Ganga Ayush Clinic",
    "latlng": [13.1242579, 80.2599516]
  },
  {
    "name": "Divine Ayush",
    "latlng": [13.0722272, 80.2535217]
  },
  {
    "name": "AYUSH THERAPY CENTRE",
    "latlng": [13.0367216, 80.2675788]
  },
  {
    "name": "Dr AYUS HOMOEOPATHY HOSPITAL",
    "latlng": [12.9140552, 80.071111]
  },
  {
    "name": "Dr Siva Siddha Ayurveda Medicals & Clinic",
    "latlng": [12.9384484, 80.1293461]
  },
  {
    "name": "SREE AYUSH AGENCIES & HOMOEO PHARMACY",
    "latlng": [12.9742605, 80.2132107]
  },
  {
    "name": "DUTI AYUSH",
    "latlng": [13.0475254, 80.2090117]
  },
  {
    "name": "Narpavi Ayush Wellness Center (Best Ayurveda Clinic in Chennai)",
    "latlng": [12.9971072, 80.0966491]
  },
  {
    "name": "Sukriti Ayur -Dr Apoorva BAMS (Ayurvedic Doctor)",
    "latlng": [12.9050523, 80.2098732]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [13.0757538, 80.2349295]
  },
  {
    "name": "Aathirai ayush clinic (natural fertility center)",
    "latlng": [13.0547071, 80.2106258]
  },
  {
    "name": "Dr. K.S. AYUSH CURES & CARES - Dr. SUNITHA'S HOMEO SPECIALITY",
    "latlng": [12.9663478, 80.2089597]
  },
  {
    "name": "Ayush 100 Clinic",
    "latlng": [13.0537217, 80.2341048]
  },
  {
    "name": "basil healthcare-ayush",
    "latlng": [12.9622622, 80.2424243]
  },
  {
    "name": "Swe Ayush Thiruvanmiyur",
    "latlng": [12.9882151, 80.2581639]
  },
  {
    "name": "Vruksha's Ayush clinic",
    "latlng": [13.0504505, 80.2638957]
  },
  {
    "name": "Ayush Clinic",
    "latlng": [13.0935504, 80.2612026]
  },
  {
    "name": "Ayush Prayoga Ayurvedic Hospital",
    "latlng": [12.9218579, 80.1671541]
  },
  {
    "name": "Dr Hajith's ayush panchakarma chikithsalaya",
    "latlng": [13.0031536, 80.1082833]
  },
  {
    "name": "The Arya Vaidya Pharmacy (Cbe) Limited -Ayur-Raksha Ayurveda",
    "latlng": [12.9272159, 80.2016645]
  },
  {
    "name": "AYUSH THERAPY CENTER",
    "latlng": [13.0026107, 80.2710816]
  },
  {
    "name": "Ayush Therapy Centre",
    "latlng": [13.0381281, 80.21365]
  },
  {
    "name": "Ayush Therapy Centre",
    "latlng": [13.0604003, 80.2497867]
  },
  {
    "name": "Smilee Ayush Health Care Center",
    "latlng": [13.0463093, 80.2346331]
  },
  {
    "name": "DHEERGA AYUSH AYURVEDA SIDDHA CLINIC",
    "latlng": [12.9964954, 80.2585112]
  },
  {
    "name": "Ayush Herbal Clinic",
    "latlng": [13.0509608, 80.2133505]
  },
  {
    "name": "Sri Rajashyamala Ayush Vaidyashala",
    "latlng": [12.9964629, 80.2680016]
  },
  {
    "name": "SREE PANDI AYUSH HOSPITAL(SIDDHA,AYURVEDHA,ACUPUNCTURE,VARMA,HOMEOPATHY,YOGA,DIET THERAPY,PANCHAKARMA,MASSAGE)",
    "latlng": [12.9901044, 80.1939905]
  },
  {
    "name": "Maamallan Indian Medical Foundation AYUSH Clinic",
    "latlng": [13.0170527, 80.1518929]
  },
  {
    "name": "Herbz & Healz Ayurvedic Healthcare Centre",
    "latlng": [12.9539772, 80.1871155]
  },
  {
    "name": "Aeon Ayush Clinic",
    "latlng": [13.0287805, 80.1812321]
  },
  {
    "name": "AYUSH CLINIC, Dr.Sachin Ware Homeopathic and Ayurvedic clinic",
    "latlng": [12.9743722, 80.1257543]
  },
  {
    "name": "A.M. Ayush Health Clinic",
    "latlng": [12.860192, 80.2262476]
  },
  {
    "name": "Sanjeevi's ayush hospital",
    "latlng": [12.9296469, 80.1142037]
  },
  {
    "name": "AYUSH Hospital",
    "latlng": [12.9994965, 80.2142783]
  },
  {
    "name": "ALM AYUSH Health and Wellness centres",
    "latlng": [12.8995269, 80.2358849]
  },
  {
    "name": "MK AYUSH",
    "latlng": [12.9411545, 80.1426649]
  },
  {
    "name": "AYUSH SORNAM AYURVEDA CLINIC",
    "latlng": [12.9779356, 80.2249055]
  },
  {
    "name": "DOCTOR ELANGO AYUSH HOSPITAL",
    "latlng": [12.9725534, 80.2241145]
  },
  {
    "name": "Ayush clinic",
    "latlng": [13.0308571, 80.2306022]
  },
  {
    "name": "Nigaran Ayush Clinic & Pharmacy (Siddha, Ayurvedic, Homeopathy, Unani, Flower Medicines & Organic Store)",
    "latlng": [12.9061496, 80.1997621]
  },
  {
    "name": "AYUSH SIDDHA CLINIC",
    "latlng": [12.9850011, 80.1993448]
  },
  {
    "name": "Dr.Dharan's Ayurvedic Clinic ( Ayush Prayoga)",
    "latlng": [12.9218572, 80.1671563]
  },
  {
    "name": "Ayush Ortho",
    "latlng": [12.9288315, 80.128792]
  },
  {
    "name": "Ayush Medical Store",
    "latlng": [12.9229718, 80.1604734]
  },
  {
    "name": "SS Ayurvedic Health Care Centre",
    "latlng": [12.9212869, 80.1602787]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [12.9187327, 80.2301543]
  },
  {
    "name": "AGATHI AYUSH POLYCLINIC",
    "latlng": [12.9755668, 80.1336273]
  },
  {
    "name": "Ayush Sornam Ayurveda Clinic and Pharmacy",
    "latlng": [12.94311, 80.207518]
  },
  {
    "name": "Ayush Care",
    "latlng": [12.9152838, 80.1529942]
  },
  {
    "name": "Ayush Health Centre, Ayurveda Siddha and Unani Clinic cum pharmacy",
    "latlng": [12.9381843, 80.1787335]
  },
  {
    "name": "AYUSH CLINIC, 61/1, veerathamman Koil street, Jalladianpet, Perumbakkam, Chennai- 600100",
    "latlng": [12.9110158, 80.2006387]
  },
  {
    "name": "Ayush Sornam Ayurveda Clinic & Pharmacy",
    "latlng": [12.945548, 80.2087171]
  },
  {
    "name": "Ayush ayurvedic health centre",
    "latlng": [12.962029, 80.2106676]
  },
  {
    "name": "Ayush Health Care Clinic",
    "latlng": [29.8899701, 77.8708137]
  },
  {
    "name": "Dr Ayush Clinic | Best Sexologist in Sonipat | Top Ayurvedic sexologist doctor in Haryana",
    "latlng": [28.999267, 77.0220665]
  },
  {
    "name": "Dr Ayush Clinic | Best Sexologist in Meerut/Top Ayurvedic Doctor | #No.1 Sexologist in Meerut",
    "latlng": [28.9929272, 77.7233828]
  },
  {
    "name": "AYUSH Building",
    "latlng": [21.0376178, 79.0287521]
  },
  {
    "name": "Aasha Ayurvedic Centre",
    "latlng": [28.6467193, 77.1205686]
  },
  {
    "name": "Ayush Diagnostic Pathology Lab",
    "latlng": [21.6599212, 82.1476172]
  },
  {
    "name": "Aayush Eye Clinic & lasik Center, a unit of Dr Agarwals Eye Hospital",
    "latlng": [19.0600712, 72.8962481]
  },
  {
    "name": "Ayushakti Ayurved Health Centre",
    "latlng": [19.1946798, 72.8481426]
  },
  {
    "name": "Govt. Ayurvedic Hospital",
    "latlng": [28.6635975, 77.1458654]
  },
  {
    "name": "Ayush Dental Hospital",
    "latlng": [14.4441893, 79.9846464]
  },
  {
    "name": "Ayush Physio Care",
    "latlng": [21.7206289, 73.0146276]
  },
  {
    "name": "Ayush Dental Clinic",
    "latlng": [22.093692, 82.171254]
  },
  {
    "name": "Dist. Govt. Ayurveda And Unani Combined Hospital Bidar And Office Of The Dist. Ayush Officer Bidar",
    "latlng": [17.9172923, 77.5310818]
  },
  {
    "name": "Ayush Acu Care",
    "latlng": [17.5370915, 78.515158]
  },
  {
    "name": "SAI AYUSH CHILDRENS HOSPITAL",
    "latlng": [18.6723039, 78.1058695]
  },
  {
    "name": "Dr. Shubhi's Fortitude Ayush Clinic| Gynecologist in Vaishali Nagar Jaipur| Pcod Treatment Jaipur| Ayurveda Clinic in Jaipur",
    "latlng": [26.9020111, 75.7396605]
  },
  {
    "name": "Ayush Physiotherapy Clinic",
    "latlng": [18.6026199, 73.7699864]
  },
  {
    "name": "Ayush Skin Clinic Dr Bhupendra Mishra",
    "latlng": [22.0773672, 79.5532356]
  },
  {
    "name": "Aayush Hospital & Maternity Home",
    "latlng": [21.2621956, 81.6737811]
  },
  {
    "name": "Ayush Dental",
    "latlng": [16.9615029, 82.2139807]
  },
  {
    "name": "Aayush Hospitals",
    "latlng": [16.7201937, 81.0921321]
  },
  {
    "name": "AYUSH HOMEO CLINIC",
    "latlng": [23.2090615, 80.0010364]
  },
  {
    "name": "Ayusya Ayurvedic Superspeciality Treatment Centre - Ultadanga",
    "latlng": [22.591767, 88.391534]
  },
  {
    "name": "Ayush Multispeciality Homeopathic Clinic dhanori",
    "latlng": [18.5830023, 73.8836191]
  },
  {
    "name": "Ayush Hospital",
    "latlng": [21.1902344, 79.384359]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [13.1162356, 80.2325942]
  },
  {
    "name": "AYUSH PHYSIOTHERAPY CENTER",
    "latlng": [19.0006135, 75.7567812]
  },
  {
    "name": "Ayush Medical and surgical agencies",
    "latlng": [16.5080751, 80.6209991]
  },
  {
    "name": "Govt Ayush Wing Indore",
    "latlng": [22.7080432, 75.8306647]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [13.0757538, 80.2349295]
  },
  {
    "name": "Sai Ayush Ayurveda Hospital (pain, sciatica, arthritis, skin, obesity, weight loss, stress, psoriasis, massage)",
    "latlng": [17.4948286, 78.3420158]
  },
  {
    "name": "Sampoorna Ayush Ayurvedic Clinic",
    "latlng": [17.3071752, 78.5262347]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [13.1234569, 80.1501877]
  },
  {
    "name": "Dr Manjunth MD ayu Ayush Clinic",
    "latlng": [16.7504434, 77.1383957]
  },
  {
    "name": "Aayush Hospitals",
    "latlng": [16.5174932, 80.6749363]
  },
  {
    "name": "Ayush Homoeopathy Cosmetic & Weight Loss Clinic",
    "latlng": [18.5818577, 73.8157176]
  },
  {
    "name": "Ayush Ayurveda",
    "latlng": [17.457207, 78.4954513]
  },
  {
    "name": "Ayush Wellness Center",
    "latlng": [17.5309185, 78.5143901]
  },
  {
    "name": "ALM AYUSH Health & Wellness Centres",
    "latlng": [12.9187327, 80.2301543]
  },
  {
    "name": "DR|| HULLER AYUSH CLINIC / ಡಾ|| ಹುಳ್ಳೇರ, ಆಯುಷ ದವಾಖಾನೆ",
    "latlng": [16.1122653, 74.9304775]
  },
  {
    "name": "Dr. Sudarsan's Ayush Ayurveda Hospital",
    "latlng": [10.7715816, 76.3881581]
  },
  {
    "name": "Aayush Clinic",
    "latlng": [16.3196523, 80.407098]
  },
  {
    "name": "JK AYUSH PHARMACY & WELLNESS CLINIC",
    "latlng": [11.9311669, 79.7975159]
  },
  {
    "name": "Ayush Ayurvedic Panchkarma & Homeopathic Hospital",
    "latlng": [19.8766499, 75.3475699]
  },
  {
    "name": "Vandevi Ayush Clinic",
    "latlng": [25.9071708, 81.9779175]
  },
  {
    "name": "AYUSH POLYCLINIC, MOTIPUR",
    "latlng": [21.1063471, 81.0213033]
  },
  {
    "name": "Ayush Hospital Pandharpur",
    "latlng": [17.6642242, 75.3191075]
  },
  {
    "name": "Swaasth Ayush - Best Ayurvedic Medicine in Hyderabad",
    "latlng": [17.5821698, 78.6036196]
  },
  {
    "name": "Ayush clinics",
    "latlng": [23.0720678, 72.5300832]
  },
  {
    "name": "Ayush Clinic",
    "latlng": [18.6493983, 73.7516128]
  },
  {
    "name": "Shreeji Ayush Clinic | Best Ayush Clinic | Manmad | Nashik | Mumbai | Pune",
    "latlng": [20.2521623, 74.4384856]
  },
  {
    "name": "Ayush Herbal Clinic",
    "latlng": [13.0509608, 80.2133505]
  },
  {
    "name": "Ayush Clinic",
    "latlng": [21.154704, 72.838047]
  },
  {
    "name": "Ayush Clinic",
    "latlng": [22.300774, 73.242313]
  },
  {
    "name": "Ayush",
    "latlng": [17.4231052, 78.4595422]
  },
  {
    "name": "Ayush clinic",
    "latlng": [23.9112094, 80.1458767]
  },
  {
    "name": "Ayush Hospital",
    "latlng": [28.7099664, 77.0813287]
  },
  {
    "name": "Ayush Naturopathy & healing centre",
    "latlng": [28.4457336, 77.3171539]
  },
  {
    "name": "Coimbatore Ayush Medical Center",
    "latlng": [11.0270644, 76.948569]
  },
  {
    "name": "Ayush Care, Homoeopathy, Ayurvedic & Unani Clinic, Zaheerabad",
    "latlng": [17.684517, 77.6167835]
  },
  {
    "name": "Ayush clinic Dr. saurbh saini",
    "latlng": [24.568042, 73.7552589]
  },
  {
    "name": "Aeon Ayush Clinic",
    "latlng": [13.0287805, 80.1812321]
  },
  {
    "name": "ayush health care",
    "latlng": [13.0126225, 77.519225]
  }

];

L.marker([userLat, userLng], {
    icon: L.icon({
        iconUrl: 'img/placeholder.png', // Updated iconUrl
        iconSize: [25, 41]
    })
}).addTo(map);
var customMarkerCss = '.custom-marker { background-color: red; }';
var customMarkerStyle = document.createElement('style');
customMarkerStyle.type = 'text/css';
customMarkerStyle.appendChild(document.createTextNode(customMarkerCss));
document.getElementsByTagName('head')[0].appendChild(customMarkerStyle);

            // Calculate distances and sort by distance
            ayushCenters.forEach((center) => {
                center.distance = L.latLng(userLat, userLng).distanceTo(center.latlng);
            });

            ayushCenters.sort((a, b) => a.distance - b.distance);

            // Display the top 4 closest clinics
            const numClinicsToShow = 4;
            for (let i = 0; i < Math.min(numClinicsToShow, ayushCenters.length); i++) {
                const clinic = ayushCenters[i];
                L.marker(clinic.latlng).addTo(map)
                    .bindPopup(`Clinic: ${clinic.name}<br>Distance: ${clinic.distance.toFixed(2)} meters`);
            }
        });
    </script>
</main>
<footer class="grid">
            <!-- Footer - top -->
            <!-- Image-->
            <div class="s-12 l-3 m-row-3 margin-bottom background-image" style="background-image:url(img/img-04.jpg)"></div>
            
            <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
               <h2 class="text-strong text-uppercase">Who We Are?</h2>
               <p>The Ministry of Ayush, established in November 2014, aims to promote ancient healthcare systems. It evolved from the Department of ISM&H in 1995, later focusing on Ayurveda, Yoga, Naturopathy, Unani, Siddha, and Homoeopathy.</p>
            </div>
                    
            <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
               <h2 class="text-strong text-uppercase">Contact Us</h2>
               <p><b class="text-primary margin-right-10">P</b> 1800-11-22-02 (9:00 AM to 5:30 PM) (IST)</p>
               <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:contact@sampledomain.com">contact@sampledomain.com</a></p>
               <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:office@sampledomain.com">office@sampledomain.com</a></p>
            </div>
            
            <!-- Footer - bottom -->
            <div class="s-12 text-center margin-bottom">
              <p class="text-size-12">Copyright 2023</p>
              <p class="text-size-12">All Rights Reserved</p>
              
              <p><a class="text-size-12 text-primary-hover" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding by Team THE BOYS</a></p>
            </div>
          </footer>                                                           
          <script type="text/javascript" src="js/responsee.js"></script>
          <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
          <script type="text/javascript" src="js/template-scripts.js"></script>
          <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script>
  window.botpressWebChat.init({
      "composerPlaceholder": "Chat with AYU - BOT",
      "botConversationDescription": "",
      "botId": "c300e6db-bae7-4662-bfbf-24954df767c0",
      "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
      "messagingUrl": "https://messaging.botpress.cloud",
      "clientId": "c300e6db-bae7-4662-bfbf-24954df767c0",
      "lazySocket": true,
      "botName": "AYU - BOT",
      "stylesheet": "https://webchat-styler-css.botpress.app/prod/0e8d24bb-9850-4a5b-a267-6585a0afb882/v93347/style.css",
      "frontendVersion": "v1",
      "useSessionStorage": true,
      "enableConversationDeletion": true
  });
</script>
</body>
</html>