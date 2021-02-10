import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { map } from 'rxjs/operators';
import { Fuel } from 'src/app/models/basis/fuel.model';
import { UtilService } from '../../util/util.service';

@Injectable({
  providedIn: 'root'
})
export class FuelService {
  apiUrl: string;

  fuels: BehaviorSubject<Array<Fuel>>;

  constructor(private httpClient: HttpClient) {
    this.apiUrl = UtilService.getAPIUrl();

    this.fuels = new BehaviorSubject<Array<Fuel>>([]);
  }

  getFuels() {
    return this.httpClient
      .get(this.apiUrl + '/api/v1/fuels')
      .pipe(
        map((res: any) => {
          const arrayFuels = res.map((item: any) => Fuel.fromJSON(item));
          return { fuels: arrayFuels }
        })
      )
      .subscribe((data: any) => {
        this.fuels.next(data.fuels);
      });
  }
}
