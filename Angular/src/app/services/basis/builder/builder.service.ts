import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';
import { UtilService } from './../../util/util.service';
import { BehaviorSubject } from 'rxjs';
import { Injectable } from '@angular/core';
import { Builder } from 'src/app/models/basis/builder.model';

@Injectable({
  providedIn: 'root'
})
export class BuilderService {
  apiUrl: string;

  builders: BehaviorSubject<Array<Builder>>;

  constructor(private httpClient: HttpClient) {
    this.apiUrl = UtilService.getAPIUrl();

    this.builders = new BehaviorSubject<Array<Builder>>([]);
  }

  getBuilders() {
    return this.httpClient
      .get(this.apiUrl + '/api/v1/builders')
      .pipe(
        map((res: any) => {
          const arrayBuilders = res.map((item: any) => Builder.fromJSON(item));
          return { builders: arrayBuilders }
        })
      )
      .subscribe((data: any) => {
        this.builders.next(data.builders);
      });
  }
}
