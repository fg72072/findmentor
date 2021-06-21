var country = [
    {
        CountryName:"Pakistan",
        Coin:"5"
    },
    {
        CountryName:"England",
        Coin:"2"
    },
    {
        CountryName:"Australia",
        Coin:"3"
    },
    {
        CountryName:"Sri Lanka",
        Coin:"0"
    },
    {
        CountryName:"zealand",
        Coin:"5"
    },
    {
        CountryName:"Bhutan",
        Coin:"5"
    },
    {
        CountryName:"Aghnaistan",
        Coin:"2"
    },
    {
        CountryName:"Palestine",
        Coin:"3"
    },
    {
        CountryName:"zimbabwe",
        Coin:"0"
    },
    {
        CountryName:"new zealand",
        Coin:"5"
    },
    {
        CountryName:"Belgium",
        Coin:"5"
    }
    ,
    {
        CountryName:"France",
        Coin:"5"
    },
    {
        CountryName:"Italy",
        Coin:"5"
    },
    {
        CountryName:"Portugal",
        Coin:"5"
    },
    {
        CountryName:"bermuda",
        Coin:"5"
    },
    {
        CountryName:"azerbaiajan",
        Coin:"5"
    },
    {
        CountryName:"cape town",
        Coin:"5"
    },
    {
        CountryName:"cape island",
        Coin:"5"
    },
    {
        CountryName:"verdana",
        Coin:"5"
    }
]

//copy text
/* return content of input field to variable text */
var text = document.getElementById("inputText");
/* return button to variable btn */
var btn = document.getElementById("copyText");

/* call function on button click */
btn.addEventListener("click",function()
{
    text.select();    
    document.execCommand("copy");
    
    

}) 


var text1 = document.getElementById("inputText1");
/* return button to variable btn */
var btn1 = document.getElementById("copyText1");

/* call function on button click */
btn1.addEventListener("click",function()
{
    text1.select();    
    document.execCommand("copy");
    

}) 

var list = document.querySelector(".List")
var Countryname = document.querySelector(".Countryname")
var Countrycoin = document.querySelector(".Countrycoin")
var back= document.querySelector(".back")
var next= document.querySelector(".next")
var value=0
var flag = 0




function Add(Countryname, Countrycoin){

    const position = "beforeend";
    const item = `  <tr >
    <td class="Countryname">${Countryname}</td>
    <td class="Countrycoin">${Countrycoin}</td>

  </tr>`;

    list.insertAdjacentHTML(position, item);


};

var render = (value) =>{

    list.innerHTML = "";

    country.forEach(doc => {

        if (country.indexOf(doc) < value+5 )
        {

        Add(doc.CountryName, doc.Coin);


        }

        doc=doc+5
        
        });
}
render(value)

back.addEventListener("click",function()
{
   
    value=value-5
    render(value)
    

})
next.addEventListener("click",function()
{   
    value=value+5
    render(value)
   


})

