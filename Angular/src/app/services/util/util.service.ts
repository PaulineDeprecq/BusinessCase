import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UtilService {

  constructor() {}

  /**
   * Ruturn the URL API
   */
  static getAPIUrl() {
    return 'https://localhost:8000';
  }
}
