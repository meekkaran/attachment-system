function vuemail(){
    //Rules for email
    //emails syntax is localpart@domain
    //shortest email length is a@b.cd
    //Function to check Email is valid
    //First Get Email Value
    var uemailval = uemail.value;
    //Get index values for email contents
    var atpos = uemailval.indexOf("@");//Position of @
    var dotlast = uemailval.lastIndexOf(".");//Last Occurence of dot
    var atdotdiff = dotlast-atpos;//Any characters between two
    var afterdot = dotlast+3;//At least two characters after .
    //Split The Email parts
    var lclpart = uemailval.substring(0, atpos);//Gets part from the start of string to and excluding @
    var dmn = uemailval.substring(atpos+1); //Gets part after @ which is domain
    //Special Characters string
    var spclchar = "~`!@#$%^&*_+{}[]|;:<>,/?";
    //Check if domain has special characters
    var dmnsp = false;
    //loop thorugh the spclchar string to see if any character is in the domain
    for(var i=0; i<spclchar.length; i++){
        var charac = spclchar[i];
        //Check if the special char is in the domain
        if(dmn.includes(charac)){
            dmnsp = true;
            break;//Break the loop
        }
    }
    console.log(dmn);
    //Validate Email
    if(uemailval === ""){
        //Value is empty
        valsucc(uemail, emailerr, 'You have not Supplied an email but it is okay');
        uemailval = "null";
        emailvalid = true;
    }
    else if(atpos==-1){
        //Email has no @
        valerr(uemail, emailerr, 'Email Must have @. Match the following email syntax: mimi@gmail.com');
        emailvalid = false;
    }
    else if(dotlast==-1){
        //Email has no dot
        valerr(uemail, emailerr, 'Email Must have dot(.) character. Match the following email syntax: mimi@gmail.com');
        emailvalid = false;
    }
    else if(atpos<1){
        //Local Part is too short
        valerr(uemail, emailerr, 'Email is invalid, Local-part is too short. Part before @ must have at least one character');
        emailvalid = false;
    }
    else if(atdotdiff<2){
        //Part between @ and . is too short
        valerr(uemail, emailerr, 'Email is invalid. Part between @ and .  must have at least one charachter');
        emailvalid = false;
    }
    else if(uemailval.length<afterdot){
        //Domain is Short
        valerr(uemail, emailerr, 'Email is invalid. Domain[part after .] must have at least two charachters');
        emailvalid = false;
    } 
    //Now we can validate Local-part
    else if(lclpart[0] == "."){
        //First character is a dot
        valerr(uemail, emailerr, 'Email Cannot start with a dot');
        emailvalid = false;
    }
    else if(lclpart[lclpart.length-1]=="."){
        //Last Character is a dot
        valerr(uemail, emailerr, 'Email is Invalid. Last character before @ cannot be a dot');
        emailvalid = false;
    }
    else if(lclpart.includes("..")){
        //Consecutive dots
        valerr(uemail, emailerr, 'Email is invalid. Email Cannot have consecutive dots: ..');
        emailvalid = false;
    }
    //Now we can validate Domain part
    else if(dmn[0]=="-"){
        //First character is a hyphen
        valerr(uemail, emailerr, 'Email is invalid. First character after @ cannot be a hyphen -');
        emailvalid = false;
    }
    else if(dmn[dmn.length-1]=="-"){
        //Last Character is a hyphen
        valerr(uemail, emailerr, 'Email is invalid. Cannot end with a hyphen.');
        emailvalid = false;
    }
    else if(dmnsp==true){
        //Special Characters
        valerr(uemail, emailerr, 'Email is invalid. Your Domain cannot have special characters');
        emailvalid = false;
    }else{
        valsucc(uemail, emailerr, 'Email is valid');
        emailvalid = true;
    }

}