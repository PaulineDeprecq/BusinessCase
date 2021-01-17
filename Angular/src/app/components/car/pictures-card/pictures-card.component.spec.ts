import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PicturesCardComponent } from './pictures-card.component';

describe('PicturesCardComponent', () => {
  let component: PicturesCardComponent;
  let fixture: ComponentFixture<PicturesCardComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PicturesCardComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PicturesCardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
