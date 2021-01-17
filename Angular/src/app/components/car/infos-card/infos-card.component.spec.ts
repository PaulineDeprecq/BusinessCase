import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { InfosCardComponent } from './infos-card.component';

describe('InfosCardComponent', () => {
  let component: InfosCardComponent;
  let fixture: ComponentFixture<InfosCardComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ InfosCardComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(InfosCardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
