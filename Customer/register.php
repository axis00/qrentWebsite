<html>
    
    <head>
        <title>Registration</title>
    </head>
    <body>
        <a href="index.php"><input type="button" value="return"></a>
        <form action="profile.php" method="post">
            <input type="text" id="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name"> <br>
            <input type="email" name="email" placeholder="E-mail Address"> <br>
            <input type="text" name="username" placeholder="Username"> <br>
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="verifyPassord" placeholder="Re-enter Password"><br>
            <p>Birthday</p>
            <select name="month">
                <option value="None">--Month--</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            
            <select name="day">
                <option value="None">--Day--</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
            </select>
            
            <select name="year">
                <option value="None">--Year--</option>
                <option>1970</option>
                <option>1971</option>
                <option>1972</option>
                <option>1973</option>
                <option>1974</option>
                <option>1975</option>
                <option>1976</option>
                <option>1977</option>
                <option>1978</option>
                <option>1979</option>
                <option>197</option>
                <option>1980</option>
                <option>1981</option>
                <option>1982</option>
                <option>1983</option>
                <option>1984</option>
                <option>1985</option>
                <option>1986</option>
                <option>1987</option>
                <option>1988</option>
                <option>1989</option>
                <option>1990</option>
                <option>1991</option>
                <option>1992</option>
                <option>1993</option>
                <option>1994</option>
                <option>1995</option>
                <option>1996</option>
                <option>1997</option>
                <option>1998</option>
                <option>1999</option>
                <option>2000</option>
                <option>2001</option>
            </select>
            <br>
            <input type="submit" value="Register">
        </form>

    </body>
</html>