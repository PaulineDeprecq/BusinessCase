import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'thousandSeparator'
})
export class ThousandSeparatorPipe implements PipeTransform {

  /**
   * Transform a number like '25493248' into '25 493 248'
   * @param number 
   */
  transform(number: any): any {
    if (number === '') { return ''; }
    let rgx;
    number += '';
    rgx = /(\d+)(\d{3})/;
    while (rgx.test(number)) {
      number = number.replace(rgx, '$1' + ' ' + '$2');
    }
    return number;
  }

}
