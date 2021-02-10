import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { map } from 'rxjs/operators';
import { Model } from 'src/app/models/basis/model.model';
import { UtilService } from '../../util/util.service';

@Injectable({
  providedIn: 'root'
})
export class ModelService {
  apiUrl: string;

  models: BehaviorSubject<Array<Model>>;

  constructor(private httpClient: HttpClient) {
    this.apiUrl = UtilService.getAPIUrl();

    this.models = new BehaviorSubject<Array<Model>>([]);
  }

  getModels() {
    return this.httpClient
      .get(this.apiUrl + '/api/v1/models')
      .pipe(
        map((res: any) => {
          const arrayModels = res.map((item: any) => Model.fromJSON(item));
          return { models: arrayModels }
        })
      )
      .subscribe((data: any) => {
        this.models.next(data.models);
      });
  }
}
