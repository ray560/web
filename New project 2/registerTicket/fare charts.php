
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style1.css">
    <script>
      var xhttp = new XMLHttpRequest();
      
      var seats_to_reserve = []; 
       
       function checkIfReserved(){
         
        var xhttp = new XMLHttpRequest();
         //iterate through all the seats
         console.log("checking  reserved");
         for(var i = 0; i<=53; i++){

             
          xhttp.open("GET", "confirmSeat.php?id="+i, true);
            
          console.log( "checking " + i);
           
           
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                  if(this.responseText==1)
                  {
                    console.log("seat taken");
                    //disable from beign selected

                  }else{
                    console.log("seat not taken");
                    document.getElementById("seat_"+seat_no).style.backgroundColor = "gray";
                  }
         
            }
          };
         }
        
        }

        //performs two functions, selecting and deselecting
        function reserveSeat( seat_no){
         
          document.getElementById("seat_chosen").value =  seat_no;
          document.getElementById("seat_chosen").innerHTML =  seat_no;
          console.log("value set "+document.getElementById("seat_chosen").value);
          var xhttp = new XMLHttpRequest();
          console.log(seat_no)
          xhttp.open("GET", "confirmSeat.php?id="+seat_no, true);
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
                if(this.responseText==1)
                {
                  console.log("seat taken");
                }else{
                  console.log("seat not taken");
                }
         
            }
          };
         
          console.log("creating connection");
          xhttp.send();
          
          
          //if a seat is gray, the select it
          if(document.getElementById("seat_"+seat_no).style.backgroundColor == "gray"){
              document.getElementById("seat_"+seat_no).style.backgroundColor = "blue";
              seats_to_reserve.push(seat_no);
          }else{
            //reset color of seat
            document.getElementById("seat_"+seat_no).style.backgroundColor = "gray";
            //find the index of the seat_no in array
            var index = seats_to_reserve.indexOf(seat_no);
            //delete the seat_no from reserved array
            seats_to_reserve.splice(index, seat_no);
          }
        }
    </script>
    <title>BUS RAPID TRANSIT | fare charts</title>

  </head>
  <body>
    

    <div class="main">
      <header>
        <div class="navigation">
          <nav>
            <ul>
              <li><a href="index.php">.Home</a></li>
              <li><a href="fare charts.php">.Fare Charts</a></li>
              <li><a href="gallery.php">.Gallery</a></li>
              <li><a href="about us1.php">.About Us</a></li>
              <li><a href="collect.php">.Collect</a></li>
              <li><a href="contacts.php">.Contacts</a></li>
            </ul>
          </nav>
          </div>
      </header>
      <div class = "mainPage">
        <form action="getticket.php">
        <div id="destination">
          <div class="destination_form" action="checkseats.php" method="get">
            <div class="dropdowns">
                <div class="destination_label">Destination</div>
              <!-- from destination -->
              <div>
                <div   class="from_dropdown">
                <div class="from_label">From:</div>
                  <select name="from_destination" required="true" data-placeholder="Select an option">
                      <option value="CBD">CBD</option>
                      <option value="Kangemi">Kangemi</option>
                      <option value="Rongai">Rongai</option>
                      <option value="Westlands">Westlands</option>
                  </select>
                </div>
              </div>
              <!-- to destination -->
              <div>
                <div class="to_dropdown">
                <div class="To_label">To:</div>
                    <select name="to_destination" required="true" data-placeholder="Select an option">
                      <option value="Rongai">Rongai</option>
                      <option value="CBD">CBD</option>
                      <option value="Kangemi">Kangemi</option>
                      <option value="Westlands">Westlands</option>
                    </select>
                </div>
              </div>
              <!-- submit -->
              <div class="submit_locations">
                <button name="example-button" type="action">check bus</button>
              </div>
            </div>
            
      </div>
        </div>
        <div id="ticket">
        <div id="bus">
          
          <div id="driver_dock">
            <div class="driver"  onclick="checkIfReserved()">driver</div>
            <div class="door">door</div>
          </div>
          <div id="passangers_area" onload="checkIfReserved()">
            <!-- left seats / door -->
            <div class="col1">
              <!-- row 1 -->
              <div class="seat_row">
                <div class="seat" id="seat_1" onclick = "reserveSeat(1)">1</div>
                <div class="seat" id="seat_2" onclick = "reserveSeat(2)">2</div>
              </div>
              <!-- row 2 -->
              <div class="seat_row">
                <div class="seat" id="seat_5" onclick = "reserveSeat(5)">5</div>
                <div class="seat" id="seat_6" onclick = "reserveSeat(6)">6</div>
              </div>
              <!-- row 3 -->
              <div class="seat_row">
                <div class="seat" id="seat_9" onclick = "reserveSeat(9)">9</div>
                <div class="seat" id="seat_10" onclick = "reserveSeat(10)">10</div>
              </div>
              <!-- row 4 -->
              <div class="seat_row">
                <div class="seat" id="seat_13" onclick = "reserveSeat(13)">13</div>
                <div class="seat" id="seat_14" onclick = "reserveSeat(14)">14</div>
              </div>
              <!-- row 5 -->
              <div class="seat_row">
                <div class="seat" id="seat_17" onclick = "reserveSeat(17)">17</div>
                <div class="seat" id="seat_18" onclick = "reserveSeat(18)">18</div>
              </div>
              <!-- row 6 -->
              <div class="seat_row">
                <div class="seat" id="seat_21" onclick = "reserveSeat(21)">21</div>
                <div class="seat" id="seat_22" onclick = "reserveSeat(22)">22</div>
              </div>
              <!-- row 7 -->
              <div class="seat_row">
                <div class="seat" id="seat_25" onclick = "reserveSeat(25)">25</div>
                <div class="seat" id="seat_26" onclick = "reserveSeat(26)">26</div>
              </div>
              <!-- row 8 -->
              <div class="seat_row">
                <div class="seat" id="seat_29" onclick = "reserveSeat(29)">29</div>
                <div class="seat" id="seat_30" onclick = "reserveSeat(30)">30</div>
              </div>
              <!-- row 9 -->
              <div class="seat_row">
                <div class="seat" id="seat_33" onclick = "reserveSeat(33)">33</div>
                <div class="seat" id="seat_34" onclick = "reserveSeat(34)">34</div>
              </div>
              <!-- row 10 -->
              <div class="seat_row">
                <div class="seat" id="seat_37" onclick = "reserveSeat(37)">37</div>
                <div class="seat" id="seat_38" onclick = "reserveSeat(38)">38</div>
              </div>
              <!-- row 11 -->
              <div class="seat_row">
                <div class="seat" id="seat_41" onclick = "reserveSeat(41)">41</div>
                <div class="seat" id="seat_42" onclick = "reserveSeat(42)">42</div>
              </div>
              <!-- row 12 -->
              <div class="seat_row">
                <div class="seat" id="seat_45" onclick = "reserveSeat(45)">45</div>
                <div class="seat" id="seat_46" onclick = "reserveSeat(46)">46</div>
              </div>
              <!-- row 13 -->
              <div class="seat_row">
                <div class="seat" id="seat_49" onclick = "reserveSeat(49)">49</div>
                <div class="seat" id="seat_50" onclick = "reserveSeat(50)">50</div>
              </div>
            </div>
            <!-- aisle / passage -->
            <div class="col2">
            <div class="aisle" style="height: 1164px;">aisle</div>
            <div class="seat" id="seat_51" onclick = "reserveSeat(51)">51</div>
            </div>

            <!-- right seats/ driver -->
            <div class="col3">
              
              <!-- row 1 -->
              <div class="seat_row">
                <div class="seat" id="seat_3" onclick = "reserveSeat(3)">3</div>
                <div class="seat" id="seat_4" onclick = "reserveSeat(4)">4</div>
              </div>
              <!-- row 2 -->
              <div class="seat_row">
                <div class="seat" id="seat_7" onclick = "reserveSeat(7)">7</div>
                <div class="seat" id="seat_8" onclick = "reserveSeat(8)">8</div>
              </div>
              <!-- row 3 -->
              <div class="seat_row">
                <div class="seat" id="seat_11" onclick = "reserveSeat(11)">11</div>
                <div class="seat" id="seat_12" onclick = "reserveSeat(12)">12</div>
              </div>
              <!-- row 4 -->
              <div class="seat_row">
                <div class="seat" id="seat_15" onclick = "reserveSeat(15)">15</div>
                <div class="seat" id="seat_16" onclick = "reserveSeat(16)">16</div>
              </div>
              <!-- row 5 -->
              <div class="seat_row">
                <div class="seat" id="seat_19" onclick = "reserveSeat(19)">19</div>
                <div class="seat" id="seat_20" onclick = "reserveSeat(20)">20</div>
              </div>
              <!-- row 6 -->
              <div class="seat_row">
                <div class="seat" id="seat_23" onclick = "reserveSeat(23)">23</div>
                <div class="seat" id="seat_24" onclick = "reserveSeat(24)">24</div>
              </div>
              <!-- row 7 -->
              <div class="seat_row">
                <div class="seat" id="seat_27" onclick = "reserveSeat(27)">27</div>
                <div class="seat" id="seat_28" onclick = "reserveSeat(28)">28</div>
              </div>
              <!-- row 8 -->
              <div class="seat_row">
                <div class="seat" id="seat_31" onclick = "reserveSeat(31)">31</div>
                <div class="seat" id="seat_32" onclick = "reserveSeat(32)">32</div>
              </div>
              <!-- row 9 -->
              <div class="seat_row">
                <div class="seat" id="seat_35" onclick = "reserveSeat(35)">35</div>
                <div class="seat" id="seat_36" onclick = "reserveSeat(36)">36</div>
              </div>
              <!-- row 10 -->
              <div class="seat_row">
                <div class="seat" id="seat_39" onclick = "reserveSeat(39)">39</div>
                <div class="seat" id="seat_40" onclick = "reserveSeat(40)">40</div>
              </div>
              <!-- row 11 -->
              <div class="seat_row">
                <div class="seat" id="seat_43" onclick = "reserveSeat(43)">43</div>
                <div class="seat" id="seat_44" onclick = "reserveSeat(44)">44</div>
              </div>
              <!-- row 12 -->
              <div class="seat_row">
                <div class="seat" id="seat_47" onclick = "reserveSeat(47)">47</div>
                <div class="seat" id="seat_48" onclick = "reserveSeat(48)">48</div>
              </div>
              <!-- row 13 -->
              <div class="seat_row">
                <div class="seat" id="seat_52" onclick = "reserveSeat(52)">52</div>
                <div class="seat" id="seat_53" onclick = "reserveSeat(53)">53</div>
              </div>
            </div>
            
          </div>
    
             
          <!-- end of bus div -->
        </div>
        <!-- form for filling in details. -->
        <div>
                    <label for="seat_no">Seat Number:</label>
                    <input type="text" value = "34" id="seat_chosen" name="seat_no">
          </div>

            <div id="details">
                
                    <label for="fname">First name:</label>
                    <input type="text" id="fname" name="fname">
                    <label for="lname">Last name:</label>
                    <input type="text" id="lname" name="lname">
                    <label for="pnumber">phone Number:</label>
                    <input type="text" id="pnumber" name="pnumber">
                    <label for="amount">Amount:</label>
                    <input type="text" value = "1" id="amount" name="amount">
               
            </div>
            <div id="submit_">
                <input  type="submit">
            </div>
         </form>
        <div>

        </div>
        </div>

      </div>
        </div>
      <aside>

      </aside>
      
      <footer>
        <span>&copy .bus rapid transit LTD</span>
          <ul>
            <li><a href="facebook.com">.fb</a></li>
            <li><a href="instagram.com">.ig</a></li>
            <li><a href="twitter.com">.tw</a></li>
          </ul>
      </footer>
    </div>
  </body>
</html>
