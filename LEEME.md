Pluralizador
============

Singularizar y pluralizar palabras en español.

## Uso ( sin Eloquent de Laravel ) 

* Singular
```
# Singular
> use Pluralizador\Infector as Str;
> $singularFromPlural = Str::singular("jueces");
> echo $singularFromPlural; // Salida: juez
```

* Plural
```
# Plural
> use Pluralizador\Infector as Str;
> $pluralFromSingular = Str::plural("juez");
> echo $pluralFromSingular; // Salida: jueces
```

## Uso con laravel

* Puedes usar esta libreria con Eloquent de Laravel. For more info: https://github.com/davidgomezgam/pluralizador-eloquent

## Contact

David Gómez

- https://github.com/davidgomezgam
- https://twitter.com/davidgomezgam
- davidgomezgam.com

## License

Pluralizador está disponible bajo Licencia MIT. Mira el fichero LICENSE para más información.
