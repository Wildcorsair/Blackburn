<!DOCTYPE html>
<html>
  <head>
    <title>{{ title }}</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }

      html{
        height: 100%;
      }

      body{
        display: flex;
        flex-direction: column;
        height: 100%;
      }

      .header {
        display: flex;
        align-items: center;
        height: 45px;
        color: #c5c5c5;
        padding: 10px 20px;
        flex: 0 0 auto;
        background: -ms-linear-gradient(to top, #f8f8f8, #ffffff);
        background: -moz-linear-gradient(to top, #f8f8f8, #ffffff);
        background: linear-gradient(to top, #f8f8f8, #ffffff);
        box-shadow: 1px 1px 1px 0 rgba(0, 0, 0, 0.1);
      }

      .logo {
        color: #aeaeae;
        margin-right: 10px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
      }

      .main {
        flex: 1 0 auto;
        width: 1170px;
        max-width: 1170px;
        margin: 0 auto;
        color: #595959;
      }

      .welcome {
        padding: 20px 15px;
      }

      .footer {
        color: #aeaeae;
        padding: 10px 20px;
        height: 20px;
        font-size: 14px;
        text-align: center;
        flex: 0 0 auto;
        box-shadow: 0 1px 1px 0 inset rgba(0, 0, 0, 0.1);
        background-color: #f2f2f2;
      }
    </style>
  </head>
  <body>
    <header class="header">
      <span class="logo">Blackburn</span>
      <span>small framework</span>
    </header>
    <main class="main">
      <div class="welcome">
        Welcome, {{ user }}!
      </div>
    </main>
    <footer class="footer">
      Copyright &copy; 2022 Golden Eagle Team
    </footer>
  </body>
</html>