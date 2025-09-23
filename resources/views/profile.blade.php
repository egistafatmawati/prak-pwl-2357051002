<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Profile</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background:#f0f9ff; /* biru muda lembut */
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
  }
  .card {
    background:#ffffff;
    padding:32px;
    border-radius:12px;
    width:320px;
    text-align:center;
    box-shadow:0 6px 18px rgba(56,189,248,0.2); /* biru soft */
  }
  .avatar {
    width:120px;
    height:120px;
    margin:0 auto 22px;
    border-radius:50%;
    background: url("{{ asset('images/profile.jpg') }}") no-repeat center;
    background-size: cover;
    border:4px solid #38bdf8; /* biru cerah */
  }
  .info {
    margin:10px 0;
    padding:12px;
    border-radius:6px;
    background:#e0f2fe; /* biru sangat muda */
    color:#0c4a6e;      /* teks biru tua */
    font-weight: bold;
  }
</style>
</head>
<body>
  <div class="card">
    <div class="avatar"></div>
    <div class="info">Egista Fatmawati</div>
    <div class="info">2357051002</div>
    <div class="info">C</div>
  </div>
</body>
</html>
