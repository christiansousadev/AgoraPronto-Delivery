import 'dart:developer';

class TypeConverter {

}
List<int> convertIntoListOfInteger(String options) {
  List<int> result = [];
  String s = options.replaceAll('(', '').replaceAll(')', '');
  log('2=2=2=2==2=2 :: >>> $s');
  List<String> res = s.split(',');
  print('====pppp==> $res');
  for (String element in res) {
    print('======check ${res.indexOf(element)}:>> $element /// ${element.toString() != '...'}');

    try{
      // if(int.tryParse(element) ?? ) {
      //
      // }
      result.add(int.parse(element));
    } catch(e) {
      print('=====not converted : $e');
    }
  }
  return result;
}