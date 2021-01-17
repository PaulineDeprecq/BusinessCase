import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProfessionalInfosComponent } from './professional-infos.component';

describe('ProfessionalInfosComponent', () => {
  let component: ProfessionalInfosComponent;
  let fixture: ComponentFixture<ProfessionalInfosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProfessionalInfosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProfessionalInfosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
