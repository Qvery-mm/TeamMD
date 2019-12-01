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
        private void OwnAccount()
        {
            Frame frame = new Frame
            {
                CornerRadius = 10,
                HasShadow = true,
                Margin = 20,
                BackgroundColor = StyleColor.color2
            };
            
            StackLayout userSt = new StackLayout
            {
                Orientation = StackOrientation.Vertical,
            };

            frame.Content = userSt;
            userSt.Children.Add(CreateStackFirstLay());
            workPlace.Children.Add(frame);
            userSt.Children.Add(new Label
            {
                Text = "e-mail: " + CurrentClient.Email
            });
            userSt.Children.Add(new Label
            {
                Text = "телефон: " + CurrentClient.Tel_number
            });
            userSt.Children.Add(new Label
            {
                Text = "Публикации", FontSize = 20
            });
            userSt.Children.Add(new Label
            {
                Text = "Участие", FontSize = 20
            });

            foreach (Event ev in CurrentClient.CurrentListOfEvent)
            {
                workPlace.Children.Add(CreateFormForEvent(ListOfEvent.IndexOf(ev), "отказаться"));
            }
        }

        private StackLayout CreateStackFirstLay()
        {
            StackLayout st = new StackLayout
            {
                Orientation = StackOrientation.Horizontal
            };

            st.Children.Add(new Image
            {
                Source = "ava.png", HeightRequest = 100, Margin = 5
            });

            StackLayout stack = new StackLayout
            {
                Orientation = StackOrientation.Vertical
            };

            st.Children.Add(stack);
            stack.Children.Add(new Label
            {
                Text = CurrentClient.Login, FontSize = 20
            });

            stack.Children.Add(new Label
            {
                Text = CurrentClient.Geopos
            });

            stack.Children.Add(new Label
            {
                Text = "Ваш текуший рейтинг: " + CurrentClient.Score
            });
            return st;
        }
    }
}
