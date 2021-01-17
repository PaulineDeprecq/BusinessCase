import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GaragesManagementComponent } from './garages-management.component';

describe('GaragesManagementComponent', () => {
  let component: GaragesManagementComponent;
  let fixture: ComponentFixture<GaragesManagementComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GaragesManagementComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GaragesManagementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
