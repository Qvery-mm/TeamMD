using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace EcoLab
{
    public partial class MainPage : ContentPage
    {
        private Event CurrentEvent;
        private Editor Messenge;

        private void EventPage()
        {
            ClMenu();
            workPlace.Children.Clear();
            StackLayout Newl = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
                VerticalOptions = LayoutOptions.Start
            };
            workPlace.Children.Add(Newl);
            Newl.Children.Add(new Label
            {
                BackgroundColor = Color.FromRgb(9, 83, 148),
                HorizontalOptions = LayoutOptions.Fill,
                HeightRequest = 5
            });

            Newl.Children.Add(new Frame
            {
                CornerRadius = 10,
                BackgroundColor = StyleColor.color1,
                Margin = 20,
                HasShadow = true,
                Padding = 15,
                Content = new Label
                {
                    HorizontalTextAlignment = TextAlignment.Center,
                    HorizontalOptions = LayoutOptions.Fill,
                    TextColor = Color.White,
                    FontSize = 20,
                    FontAttributes = FontAttributes.Bold,
                    Text = "МЕРОПРИЯТИЯ"
                }
            });

            for (int i = ListOfEvent.Count - 1; i >= 0; i--)
                Newl.Children.Add(CreateFormForEvent(i));
            scroll.ScrollToAsync(0, 0, false);

            Newl.Children.Add(CreateBottom());

        }

        private Frame CreateFormForEvent(int i)
        {
            Event ev = ListOfEvent[i];
            StackLayout stack = new StackLayout();

            Button b = new Button
            {
                BorderWidth = 1,
                BorderColor = Color.Black,
                BackgroundColor = StyleColor.color1,

                CornerRadius = 10,
                Text = "Подробнее",
                HorizontalOptions = LayoutOptions.Center
            };

            if (CurrentClient.CurrentListOfEvent.IndexOf(ev) != -1)
            {
                b.BackgroundColor = Color.White;
                stack = new StackLayout
                {
                    Orientation = StackOrientation.Vertical
                };
            }
            else
            {
                stack = new StackLayout
                {
                    Orientation = StackOrientation.Vertical
                };
            }
            stack.Children.Add(new Image
            {
                Source = ev.Picture,
                HorizontalOptions = LayoutOptions.Fill
            });
            StackLayout s = new StackLayout
            {
                Orientation = StackOrientation.Horizontal,
                HorizontalOptions = LayoutOptions.Fill,
                HeightRequest = 30
            };
            s.Children.Add(new Image
            {
                Source = "men.jpj"
            });
            s.Children.Add(new Label { Text = ev.CountOfPeop.ToString() });
            stack.Children.Add(s);
            stack.Children.Add(new Label
            {
                Text = ev.Title
            });
            stack.Children.Add(new Label
            {
                Text = "Место: " + ev.Place
            });
            stack.Children.Add(new Label
            {
                Text = "Дата: " + ev.Date
            });
            stack.Children.Add(new Label
            {
                Text = "Организатор: " + ev.Org.Login
            });
            b.Clicked += Click_Event;
            stack.Children.Add(b);

            Frame frame = new Frame
            {
                BorderColor = Color.Black,
                CornerRadius = 20,
                BackgroundColor = StyleColor.color3,
                Margin = 20,
                HasShadow = true,
                Content = stack
            };

            return frame;
        }

        private void Click_Event(object sender, EventArgs e)
        {
            StackLayout stack = (StackLayout)(((Button)sender).Parent);
            Event eve = null;
            string date = ((Label)stack.Children[4]).Text;
            string place = ((Label)stack.Children[3]).Text;
            foreach (Event ev in ListOfEvent)
                if ("Дата: " + ev.Date == date && "Место: " + ev.Place == place)
                {
                    eve = ev;
                    break;
                }
            if (eve != null)
                ShowEvent(eve);
        }

        private void ShowEvent(Event eve)
        {
            workPlace.Children.Clear();
            if (CurrentClient.CurrentListOfEvent.IndexOf(eve) != -1)
            {
                Messenge = null;
                workPlace.Children.Add(CreateFormForEvent(ListOfEvent.IndexOf(eve), "Отказаться"));
                StackLayout stack = new StackLayout { Orientation = StackOrientation.Vertical, BackgroundColor = Color.FromRgb(216, 224, 240), Padding = 10, Margin = 20 };
                if (eve.Org == CurrentClient)
                    stack.Children.Add(new Label { Text = "Написать письмо участникам: ", FontSize = 25 });
                else
                    stack.Children.Add(new Label { Text = "Написать письмо организаторам: ", FontSize = 25 });
                Messenge = new Editor { AutoSize = EditorAutoSizeOption.TextChanges };
                stack.Children.Add(Messenge);
                stack.Children.Add(new Button { Text = "Отправить", BackgroundColor = Color.FromRgb(13, 199, 10) });
                workPlace.Children.Add(stack);
            }
            else
                workPlace.Children.Add(CreateFormForEvent(ListOfEvent.IndexOf(eve), "Участвовать"));
        }

       private Frame CreateFormForEvent(int i, string buttext)
        {
            Event ev = ListOfEvent[i];
            CurrentEvent = ev;
            Random rnd = new Random();
            StackLayout stack = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
            };
            stack.Children.Add(new Image
            {
                Source = ev.Picture,
                HorizontalOptions = LayoutOptions.Fill
            });
            StackLayout s = new StackLayout
            {
                Orientation = StackOrientation.Horizontal,
                HorizontalOptions = LayoutOptions.Fill,
                HeightRequest = 30
            };
            s.Children.Add(new Image
            {
                Source = "men.jpj"
            });
            s.Children.Add(new Label
            {
                Text = ev.CountOfPeop.ToString()
            });
            stack.Children.Add(s);
            stack.Children.Add(new Label
            {
                Text = ev.Title
            });
            stack.Children.Add(new Label
            {
                Text = "Место: " + ev.Place
            });
            stack.Children.Add(new Label
            {
                Text = "Дата: " + ev.Date
            });
            stack.Children.Add(new Label
            {
                Text = "Организатор: " + ev.Org.Login
            });
            stack.Children.Add(new Label
            {
                Text = "Полная информация: " + ev.Desrib
            });
            Button b = new Button
            {
                BorderWidth = 1,
                BorderColor = Color.Black,
                BackgroundColor = StyleColor.color1,

                CornerRadius = 10,
                Text = buttext,
                HorizontalOptions = LayoutOptions.Center
            };
            b.Clicked += Click_GoToEvent;
            stack.Children.Add(b);

            Frame frame = new Frame
            {
                BorderColor = Color.Black,
                CornerRadius = 20,
                BackgroundColor = StyleColor.color3,
                Margin = 20,
                HasShadow = true,
                Content = stack
            };
            return frame;
        }

        private void Click_GoToEvent(object sender, EventArgs e)
        {
            string text = ((Button)sender).Text;
            if (text == "Участвовать")
            {
                CurrentClient.CurrentListOfEvent.Add(CurrentEvent);
                CurrentEvent.CountOfPeop++;
            }
            else
            {
                CurrentClient.CurrentListOfEvent.Remove(CurrentEvent);
                CurrentEvent.CountOfPeop--;
            }
            EventPage();
        }
    }
}
