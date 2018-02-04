var fs = require('fs');
dest = fs.createWriteStream(process.argv[2], {flags: 'a'});
if (process.argv.length < 4)
{
    console.log (' syntax: "node merge.js <dest> <f1> <f2> .. <fn>"');
    process.exit;
}

try{
    for (var i=3; i<process.argv.length; i++)
    {
        fs.createReadStream(process.argv[i]).pipe(dest);
    }
    console.log('Archivo creado: '+ process.argv[2]);
}
catch(e)
{
    console.log("Error" + e);
}
