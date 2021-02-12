import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-professional-infos',
  templateUrl: './professional-infos.component.html',
  styleUrls: ['./professional-infos.component.css']
})
export class ProfessionalInfosComponent implements OnInit {

  editPerso: boolean = false;
  editCom: boolean = false;
  editPro: boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  onClickEditPerso() {
    this.editPerso = !this.editPerso;
  }
}
