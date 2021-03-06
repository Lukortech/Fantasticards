import React from "react";

interface CardProps {
  name: string;
  value: number;
  level: number;
  element?: string;
  damage?: number;
  heal?: number;
  effect?: string;
  description?: string;
  image_uri?: string;
}

const BasicCard: React.FC<CardProps> = ({ ...props }) => {
  return (
    <div
      className={
        (props.element === "wind" ? "bg-info" : "bg-danger") +
        " d-flex flex-column mt-5 mx-auto w-25 border"
      }
    >
      <div className="top-bar d-flex justify-content-between p-2">
        <div className="name">{props.name}</div>
        <div className="level">{`lvl.` + props.level}</div>
      </div>
      <div className="middle d-flex flex-column justify-content-between">
        <div className="image w-100 h-100 px-1 py-3">
          <img className="w-100 h-100" src={props.image_uri} alt="graphic" />
        </div>
        <div className="description px-2 py-3">{props.description}</div>
      </div>
      <div className="d-flex justify-content-between effect-bar px-2">
        <div className="effect">
          {props.effect ? props.effect : "no additional effect/status"}
        </div>
      </div>
      <div className="bottom-bar d-flex justify-content-between p-2">
        <div className="value">{`value:` + props.value}</div>
        <div className="element">
          {props.element ? props.element : "Ordinary"}
        </div>
        <div className="damage">
          {`dmg:` + (props.damage ? props.damage : "-0") + `HP`}
        </div>
        <div className="heal">
          {`heal:` + (props.heal ? props.heal : "+0") + `HP`}
        </div>
      </div>
    </div>
  );
};
export default BasicCard;
