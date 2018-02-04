function agenda (titulo, inic) {
  var _titulo = titulo;
  var _contenido = inic;
  var cadena="";
  return {
    titulo: function()                    { return _titulo; },
    listar:function(){for(nombre in _contenido) cadena=cadena+nombre+","+_contenido[nombre]+"\n"; return JSON.stringify(cadena); },
    meter:  function(nombre, tf) { _contenido[nombre]=tf; },
    tf:     function(nombre)         { return _contenido[nombre]; },
    borrar: function(nombre)     { delete _contenido[nombre]; },
    toJSON: function()              { return JSON.stringify(_contenido);}
  }
}
var amigos = agenda ("Amigos",
             { Pepe: 113278561,
               José: 157845123,
               Jesús: 178512355
             });
console.log('Agenda:'+amigos.titulo());
console.log(amigos.listar());
