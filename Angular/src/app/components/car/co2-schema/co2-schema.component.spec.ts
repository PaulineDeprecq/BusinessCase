import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Co2SchemaComponent } from './co2-schema.component';

describe('Co2SchemaComponent', () => {
  let component: Co2SchemaComponent;
  let fixture: ComponentFixture<Co2SchemaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Co2SchemaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Co2SchemaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
