# afd-generator
package to generate AFD file

To generate a file simply add this code:

```
$AfdGenerator = new AfdGenerator([
  'header' => [
    'docEmpregador' => '00.000.000/0000-00',
    'nomeEmpregador' => 'COMPANY LTDA',
    'numRep' => '00000000000000000',
    'dataInicial' => '2020-12-01',
    'dataFinal' => '2020-12-31',
  ],
  'content' => [
    [
      'dataPonto' => '2020-12-01',
      'horarioPonto' => '09:00',
      'numPis' => '123123123',
    ]
  ]
]);
```
