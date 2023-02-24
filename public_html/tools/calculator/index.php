<html>
  <head>
    <style>
      body {
        background-color: #1c2331;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      
      .calculator-container {
        width: 400px;
        height: 450px;
        background-color: #34495e;
        border-radius: 10px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
      }
      
      .calculator-screen {
        width: 100%;
        height: 100px;
        background-color: #2c3e50;
        border-radius: 10px 10px 0 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
        color: white;
      }
      #result{
        width:70%;
        height:35%;
        border-radius:10px;
        background-color: #fff;
        font-weight:bold; 
      }
      .calculator-keys {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }
      
      .button {
        width: 75px;
        height: 75px;
        background-color: #7f8c8d;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        color: white;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        margin-bottom: 5px;
      }
      
      .button:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.25);
      }
.back{
    font-size: large;
    border-radius: 10px;
    color: aliceblue;
    background-color: #467873;
    
}
.back_btn{
  text-align: center;
}
    

    </style>
  </head>
  <body>
    
    <div class="calculator-container">
      <div style="color: white; font-weight: bold;font-size: xx-large;color: #68b9b9;"><center>Calculator</center></div>
      <div class="calculator-screen">

        <input type="text" id="result" disabled />
      </div>
      <div class="calculator-keys">
        
        <div class="button" id="one" onclick="addToScreen(1)">1</div>
        <div class="button" id="two" onclick="addToScreen(2)">2</div>
        <div class="button" id="three" onclick="addToScreen(3)">3</div> 
        <div class="button" id="four" onclick="addToScreen(4)">4</div>
        <div class="button" id="add" onclick="addToScreen('+')">+</div>   
        <div class="button" id="five" onclick="addToScreen(5)">5</div>
        <div class="button" id="six" onclick="addToScreen(6)">6</div> 
        <div class="button" id="seven" onclick="addToScreen(7)">7</div> 
        <div class="button" id="eight" onclick="addToScreen(8)">8</div>
        <div class="button" id="subtract" onclick="addToScreen('-')">-</div>  
        <div class="button" id="nine" onclick="addToScreen(9)">9</div>   
        <div class="button" id="zero" onclick="addToScreen(0)">0</div>
        <div class="button" id="decimal" onclick="addToScreen('.')">.</div>
        <div class="button" id="divide" onclick="addToScreen('/')">/</div>
        <div class="button" id="multiply" onclick="addToScreen('*')">x</div>
        
        
        
        <div class="button" id="clear" onclick="clearScreen()">C</div>
        
        
       

        <div class="button" id="equals" onclick="calculate()">=</div>
        

      </div>
      <div style="" class="back_btn"><button class="back">&#8612;&nbsp;Go Back</button></div>
    </div>
  </body>
  
  <script>
    const result = document.querySelector("#result");
    
    function addToScreen(value) {
      result.value += value;
    }
    
    function clearScreen() {
      result.value = "";
    }
    
    function calculate() {
      try {
        result.value = eval(result.value);
      } catch (error) {
        alert("Invalid Input");
      }
    }
  </script>
</html>

<script type="text/javascript">
  const backBtn = document.querySelector(".back");
  backBtn.addEventListener("click", function() {

    window.location.replace('https://www.thesalman.co.in/tools');
    
  });  
</script>

